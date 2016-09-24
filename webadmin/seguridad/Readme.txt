
-----------------------------------------------------------
                Clickteam Install Creator Pro
              Copyright (c) Clickteam 1999-2004
-----------------------------------------------------------

Welcome to Install Creator Pro!


UNREGISTERED VERSION
--------------------
The Unregistered version of Install Creator Pro is an evaluation version
only, it is not freeware. The installation programs that you create with this
version cannot be distributed. 

The Unregistered version has all the features of the Registered version, 
but cannot create silent installers and you cannot enter banned codes.

The install programs created with the Registered version have no end screen.

To register, just connect to http://www.clickteam.com and purchase a license
fee. You will receive a registration code that will unlock the installation
of the registered version of Install Creator Pro.


WHAT'S NEW IN INSTALL CREATOR PRO vs INSTALL MAKER PRO
------------------------------------------------------
Install Creator Pro is the sequel to Clickteam Install Maker Pro.

It uses the same principles: select a directory of files to install,
customize your install program with a few mouse clicks and build it.

It also has many new features, including:

- a better interface with customizable toolbars.

- a fully customizable interface for the install programs, with a full featured
  Dialog Box editor, ability to insert style tags into texts, change colors
  and fonts, add links, change the icon of the installer, etc.

- a better compression.

- new options to view or run several files during the installation,
  to prevent a file to be installed on certain versions of Windows,
  to prevent the installation to start if a file is in use, 
  to install files into several directories, etc.

- the ability to download files.

- a better Registration tool.

- the ability to generate short and/or numeric registration codes, and/or
  to de-activate certain registration codes in your install program.

Etc. Refer to the Welcome section of the documentation for the full list of 
new features!

BUG FIXES IN BUILD #24
----------------------
- Fix: cannot create sub-directories with UNC names.


BUG FIXES IN BUILD #22
----------------------
- New: Spanish, Italien and Dutch text templates.
- New: new directory macros:
       - Local App Data directory
       - All Users - App Data directory
       - Current User directory
       - All Users directory
- New: you can now specify the window attribute for the Start menu and Desktop
       shortcuts.
- New: new option to display the "You need to restart the machine" dialog box
       in quiet mode.
- New: new option to add a string to the end of a file, in the Install Info tab.
- New: you can use the /Q command line option if you want to run the uninstaller 
       in Quiet mode.
- New: Uninstaller: if the "file is write-protected, do you want to remove it?"
       message is empty, then the message is not displayed and read-only files
       are removed.
- New: Uninstaller: if the "this DLL is no longer used, do you want to remove it?"
       message is empty, then the message is not displayed and no longer user DLL's
       are removed.

- Fix: no more crash when you add a new source directory with the New button.
- Fix: the install programs use less CPU resource.
- Fix: under some versions of Windows Me, the install program could crash
       when it exits if a reboot was required.
- Fix: cursor incorrectly positioned when you enter an icon name manually
       in the Window page.
- Fix: you can now run at the same time 2 different install programs created
       by Install Creator.
- Fix: DLL's in use are not replaced if the installed version is identical
       to the new one.
- Fix: existing OCX controls are now unregistered before being overwritten 
       by a new version and registered again.
- Fix: if you move a page before the Welcome page, the back / Next buttons
       are now correctly enabled.
- Fix: when you edit a license or information text with a single click,
       the Edit Text dialog box is now displayed.
- Fix: the uninstaller now uninstalls files in reversed order.
- Fix: the uninstaller was not deleted sometimes on some limited user accounts.
- Fix: the edit boxes in the Registration Code screen (short codes) are
       now larger to allow short codes with more than 20 characters.
- Fix: the paths are now relative to the path of the .iip file (if possible).
- Fix: the mouse cursor is no longer changed to text cursor when the mouse
       pointer is above a static text (except if this text contains a link).
- Fix: the "All Users" option for the Desktop shortcut was ignored and replaced
       by the "All Users" option for the Start menu shortcut.
- Fix: when a file is run from the install program, the current directory is set 
       to the directory of this file.
- Fix: Install Creator now works on limited user accounts. Note: you should install
       it on an administrator account though, otherwise the shortcuts in the 
       Start menu and on the desktop won't be created.
- Fix: the download option now works even if the URL begins with "www.". instead
       of "http://www".


BUG FIXES IN BUILD #21
----------------------
- Fix: some changes in large installers so that the machine doesn't seem frozen 
       while the McAfee ASaP anti-virus program is scanning them.
- Fix: you can now create shortcuts in sub-folders of the root of the Start menu
       with "#Start Menu#\SubFolderName".


BUG FIXES IN BUILD #20
----------------------
- New: the Default option in the popup menu displayed when you right click 
       a text in the Wizard Texts and Uninstaller pages has been replaced 
       by a sub-menu which contains one default command per language template 
       available in the Templ sub-directory.
- New: macro #TempDir#, allows to install files to sub-directories of the Windows 
       temporary directory.
- New: you can check the Hidden option for the End page. If there is no error 
       during the installation, the end page won't be displayed and the installer
       will exit. If there is an error, the end page will be displayed.
       Note: this works only with the registered version of Install Creator.
- New: when there is no file to install you can now build the installer anyway.
- New: you can now use the #title macro in the names and folder names of the
       Start menu and Desktop shortcuts, as well as in the name of installation folder.
- New: you can now delete registry keys via a new "Delete Key" option in the
       Write Registry Key dialog box (Install Info tab). If this option is selected
       and a sub-key is specified, the sub-key is deleted. If no sub-key is specified,
       then the key itself is deleted, as well as its children.
- New: /F command line option for the installers. When this option is used, the
       controls (dll, ocx, etc) are registered even if they are not replaced by the
       installer. This allows you to fix possible installation problems if a newer
       version of a control has been installed but has not been registered for any reason.

- Fix: refresh problem when you use different images for the same panel.
- Fix: you can now clear the bitmap boxes in the tabs of the dialog box editor.
- Fix: it was not possible to modify the text color of some controls 
       in the Directory and Progress pages.
- Fix: icon files not immediately associated with desktop shortcuts in some cases.
- Fix: the Reboot dialog is no longer displayed in silent installers.
- Fix: the EXE file of the uninstall program was not uninstalled under some versions 
       of Windows XP installed over a version of Windows 9x.
- Fix: dependencies of executable files are automatically detected and installed first.
- Fix: controls in use are no longer uninstalled by the uninstaller.
- Fix: when you select "Default text" in the static texts 2 and 3 of the end page, 
       the texts are now set to the default texts that appear when you view and/or 
       launch a file in the end page.
- Fix: 2 missing texts have been added to the English and French text templates.


BUG FIXES IN BUILD #19
----------------------
- Fix: files that are not installed on certain platforms could be run even 
       on other platforms if they are in the directory of the install program.


BUG FIXES AND NEW FEATURES IN BUILD #18
---------------------------------------
- New: new "Fast compression" option in the Build page.
- New: you can now specify macros like #InstallDir# in the command line options 
       of the Start Menu and Desktop shortcuts.
- New: you can now install files to the My Documents and Application Data folders.

- Fix: selection and directory scans in file list are now faster.
- Fix: the default installation directory now depends on the version.
- Fix: shortcuts to executable MSDOS files are now removed by the uninstaller. 
- Fix: the user e-mail address is now stored in user registration codes
       (if the option is selected in the registration tool).
- Fix: 'i' not displayed in the Files list when a file has a shortcut 
       both in the Start menu and on the desktop.
- Fix: the read-only attribute is now preserved.
- Fix: the Destination Directory combo box was too small with some versions of Windows
- Fix: when the "do not install if already installed" option is checked and the file
       has a shortcut, the shortcut now points to the installed file. 
- Fix: you can now make multiple CD-ROM installers.
- Fix: the icon folder in the Start menu was not uninstalled sometimes under 
       Windows 2000 if you launch the uninstaller from a shortcut in this folder.
- Fix: the installers created with Install Creator Pro no longer need Wininet.dll 
       and SHLWAPI to be installed on the user's machine, so you can now run them 
       on old 95 and NT 4 machines without Internet Explorer installed. However you 
       still need these DLLs to be installed if your installer uses the Download 
       features of Install Creator Pro.
- Fix: the default font was using the ANSI character set, causing display problems 
       with Unicode versions of Windows 9x for install programs using extended
       characters (like Greek, etc) with this font.
- Fix: crash in the Dialog Editor when you edit the properties of a control and 
       select a control in the Options dialog before closing the Properties window.


Thank you for using Install Creator Pro!

The Clickteam.
http://www.clickteam.com
