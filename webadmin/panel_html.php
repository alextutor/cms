<script language="Javascript" src="<?php $_SERVER['DOCUMENT_ROOT']?>/webadmin/editor/scripts/language/es-ES/editor_lang.js"></script> 
<link rel="StyleSheet" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/webadmin/editor/scripts/style/editor.css"></script>
<link rel="StyleSheet" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/webadmin/editor/scripts/style/istoolbar.css"></script>
<script language=JavaScript src='/webadmin/editor/scripts/innovaeditor.js'></script>
<script>
/***************************************
  Required Functions
***************************************/
var sActiveAssetInput;

function setAssetValue(v) //required by the asset manager
    {
    document.getElementById(sActiveAssetInput).value = v;
  }
function openAsset(s)
  {
    sActiveAssetInput = s
    modalDialogShow("<?php $_SERVER['DOCUMENT_ROOT'] ?>/webadmin/editor/assetmanager/assetmanager.php",650,465,window);
  }
/*****************************************/
</script>
