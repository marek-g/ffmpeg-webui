ffmpeg-webui
============

WebUI interface for movie conversions with ffmpeg in my local LAN (files are not uploaded but fetched from share folder).

It's written in PHP because I needed to have it quickly and simple. It was tested only under Windows. For now it uses WScript.Shell COM object to execute ffmpeg command in the background.

Requirements:

- PSTools installed and path added to PATH environment
  http://technet.microsoft.com/en-us/sysinternals/bb896649

- FFMpeg must be added to PATH environment
