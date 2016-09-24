<?php
	echo "hola";
	/*
		This class is used for display Banner and Marchent Add in tabular format using Database Table: banner_ad_info
		$PerPageTotalRecord=$NoOfRowPerPage * $NoOfColPerPage;
		Display Records Start From ($CurPageNo-1)*$PerPageTotalRecord And Limit $PerPageTotalRecord
	*/
	
	class ImageGallery
	{
		var $NoOfRowPerPage=0;
		var $NoOfColPerPage=0;
		var $ImgAbsLoc="";
		var $CurPageNo=1;
		var $ErrorMessage="";
		
		// All Image Informations from Database 
		var $DbTableName;
		var $ImageId=array();
		var $ImageLink=array();
		var $ImageName=array();
		var $ImageTitle=array();
		var $TotalImage;
		
		function ImageGallery($DbTableName,$DisplayPageNo=1,$NoOfRow=0,$NoOfCol=0,$ImgLoc="")
		{
			$this->DbTableName=$DbTableName;
			$this->CurPageNo=$DisplayPageNo;
			$this->NoOfRowPerPage=$NoOfRow;
			$this->NoOfColPerPage=$NoOfCol;
			if(substr($ImgLoc,strlen($ImgLoc)-1,1)=="/")
				$this->ImgAbsLoc=$ImgLoc;
			else
				$this->ImgAbsLoc=$ImgLoc."/";
		}
		
		// This function used for Collect all image information display current page (using LIMIT).
		function AllImagesInformations($DbTableName,$DisplayStartFrom,$PerPageTotalRecord)
		{
			$SqlTotalImg="SELECT count(*) FROM $DbTableName";
			$SqlAllImageInfo="SELECT * FROM $DbTableName LIMIT $DisplayStartFrom,$PerPageTotalRecord"; 	//echo $SqlAllImageInfo;
			switch($DbTableName)
			{
				case "contenido": 
						$QTotalImage=mysql_query($SqlTotalImg);
						$RsTotalImage=mysql_fetch_row($QTotalImage);
						$this->TotalImage=$RsTotalImage[0];
						if($this->TotalImage>0)
						{
							$QAllImageInfo=mysql_query($SqlAllImageInfo);	//echo $Sql;
							$I=0;
							if(mysql_num_rows($QAllImageInfo)>0)
								while($RsCurImageInfo=mysql_fetch_object($QAllImageInfo))
								{
									$this->ImageId[$I]=$RsCurImageInfo->ccodcontenido;
									$this->ImageName[$I]=$RsCurImageInfo->cimgcontenido;
									$this->ImageTitle[$I]=$RsCurImageInfo->cnomcontenido;
									$this->ImageLink[$I++]=$RsCurImageInfo->cimgcontenido;
								}
						}
						break;
				case "merchant_ad_info": 
						$QTotalImage=mysql_query($SqlTotalImg);
						$RsTotalImage=mysql_fetch_row($QTotalImage);
						$this->TotalImage=$RsTotalImage[0];
						if($this->TotalImage>0)
						{
							$QAllImageInfo=mysql_query($SqlAllImageInfo);	//echo $Sql;
							$I=0;
							if(mysql_num_rows($QAllImageInfo)>0)
								while($RsCurImageInfo=mysql_fetch_object($QAllImageInfo))
								{
									$this->ImageId[$I]=$RsCurImageInfo->Pk_MerchantAdInfoId;
									$this->ImageName[$I]=$RsCurImageInfo->MerchantAdImage;
									$this->ImageTitle[$I]=$RsCurImageInfo->MerchantAdTitle;
									$this->ImageLink[$I++]=$RsCurImageInfo->MerchantAdHomePageLink;
								}
						}
						break;
				default : $this->ErrorMessage="Sorry database table name does not match.";
			}
			//echo $this->TotalImage;	//echo count($this->ImageName);	
		}
		
		// This function used for Draw Table of Banner including Paging.
		function DisplayImageGallery()
		{
			//Configration Vairables for Draw Banner Table.
				$PerPageTotalRecord=$this->NoOfRowPerPage * $this->NoOfColPerPage;
				if($CurPageNo>1)
					$DisplayStartFrom=($CurPageNo-1)*$PerPageTotalRecord;
				else
					$DisplayStartFrom=0;	//echo "DisplayStartFrom:".$DisplayStartFrom;
				$CounterDisplayBanner=0;	//Count No Of Banner Displayed
				$TdWidth=floor(100/$this->NoOfColPerPage);

			//Load All Banner Id For Current Page.
				$this->AllImagesInformations($this->DbTableName,$DisplayStartFrom,$PerPageTotalRecord);

			//Configuration for Paging/Listing
				//echo "Total Img: ".$this->TotalImage." PerPageTotalRecord: ".$PerPageTotalRecord;
				$PagingTotalPage=ceil($this->TotalImage / $PerPageTotalRecord);
				if( ($DisplayStartFrom+$PerPageTotalRecord) > $this->TotalImage)
					$PagingNextPageNo=$this->CurPageNo+1;
				if( $this->CurPageNo>1 )
					$PagingPreviousPageNo=$this->CurPageNo-1;
			
			if($this->TotalImage>0)
			{
				//Draw Images
					echo "<table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\">";
					//echo $this->ImgAbsLoc.$this->ImageName[0];
					for( ; $CounterDisplayBanner < $PerPageTotalRecord; )
					{
						$ImageNameWithLoc=$this->ImgAbsLoc.$this->ImageName[$CounterDisplayBanner];
						//echo "ImgName: ".$ImageNameWithLoc."<br>";
						if($CounterDisplayBanner % $this->NoOfColPerPage==0)
							echo "<tr>";
						echo "<td width=\"$TdWidth%\" align=\"center\">
								<div id=\"DivImage\">".$this->DisplayImage($ImageNameWithLoc)."</div><br />
								<div id=\"DivTitle\">";
						if(trim($this->ImageLink[$CounterDisplayBanner])!="")
							echo "<a href=\"".$this->ImageLink[$CounterDisplayBanner]."\" target=\"_blank\">".$this->ImageTitle[$CounterDisplayBanner]."</a></div></td>";
						else
							echo $this->ImageTitle[$CounterDisplayBanner]."</div></td>";
						$CounterDisplayBanner++;
						if(($CounterDisplayBanner % $this->NoOfColPerPage)==0)
							echo "</tr>";
					}
					
				// Bottom Listing
					echo "<tr>
							<td colspan=\"".$this->NoOfColPerPage."\" align=\"center\">";
					//Previous Link (  '<' )
						$PreviousPageNo=$this->CurPageNo-1;
						$CurPageName=$_SERVER['SCRIPT_NAME'];
						if($this->CurPageNo>1)
							echo "<a href=\"$CurPageName?DisplayPageNo=".$PreviousPageNo."\">&lt;</a>";
						else
							echo "&lt;";
					// All Listing (1,2,3....)
					for($I=1;$I<=$PagingTotalPage;$I++)
						if($I==$this->CurPageNo)
							echo $I." ";
						else
							echo "<a href=\"$CurPageName?DisplayPageNo=".$I."\">".$I."</a> ";
					//Next Link (  '<' )
						$NextPageNo=$this->CurPageNo+1;
						if($this->CurPageNo<$PagingTotalPage)
							echo "<a href=\"$CurPageName?DisplayPageNo=".$NextPageNo."\">&gt;;</a>";
						else
							echo "&gt;";
					echo "</td></tr>";
				echo "</table>";
			}	//end of if(mysql_num_rows($QAllBannerAd)>0)
		}
		
		//This Function is used for Display Image
		function DisplayImage($ImageNameWithPath,$ImageSize=0,$ImageBorder=0,$ImgBorderColor="")
		{	//echo $ImageNameWithPath."<br>";
			if(file_exists($ImageNameWithPath)) 
			{
				$ImageHeightWidth = GetImageSize($ImageNameWithPath);
				$Height = $ImageHeightWidth[1];
				$Width = $ImageHeightWidth[0];
				if($ImageSize>0 && $Width>$ImageSize)
				{
					$multiplier=$ImageSize/$Width;
					$Width = $Width*$multiplier;
					$Height = $Height*$multiplier;
				}
				return "<img width='$Width' height='$Height' src='$ImageNameWithPath' border='$ImageBorder' style='border-color: $ImgBorderColor'>";
			}
			return false;
		}
		
	}
?>
