# Image Fallback ViewHelper for TYPO3

This extension provides a simple ViewHelper to check if an image exists.

I created it as a little helper for my own extension development, but you can also use it for your projects, e.g. to check image paths from fields of your own extensions and output a placeholder if necessary. See the easiest way to use it:

```
{namespace fallback=SIMONKOEHLER\Fallback\ViewHelpers}
<f:image src="{fallback:image(url:'fileadmin/my-correct-imagepath.jpg')}" maxWidth="800" />
```

### Important note
This works only when you use the "src" attribute of the TYPO3 <f:image> Viewhelper and a relative path from your TYPO3 root directory! See example below.

## What does it do?

The ViewHelper checks whether the image is available and then outputs a placeholder. The placeholder image can be predefined using the ViewHelper attribute "placeholder", otherwise an image supplied by the extension with the dimensions 800x600 pixels is displayed.

## Installation

You only need to install the extension. No configuration or TypoScript is needed!

## Example usage

```
{namespace fallback=SIMONKOEHLER\Fallback\ViewHelpers}

<!-- Only the standard placeholder is output here. Also works well as a "helper" for extension development. -->
<f:image src="{fallback:image()}" maxWidth="800" />

<!-- Image not available: The standard placeholder is output here. -->
<f:image src="{fallback:image(url:'fileadmin/my-wrong-imagepath.jpg')}" />

<!-- Image not available with placeholder: The predefined placeholder is output here. -->
<f:image src="{fallback:image(url:'fileadmin/my-wrong-imagepath.jpg', placeholder:'fileadmin/custom-placeholder.jpg')}" />

<!-- Image available with placeholder: Here the image is output as desired. -->
<f:image src="{fallback:image(url:'fileadmin/my-correct-imagepath.jpg', placeholder:'fileadmin/custom-placeholder.jpg')}" />

<!-- Normal usage as a TAG instead of inline: Simply returns the URL -->
<fallback:image url="fileadmin/my-correct-imagepath.jpg" placeholder="fileadmin/custom-placeholder.jpg" />
```

## The placeholder image

![alt text](https://raw.githubusercontent.com/koehlersimon/fallback/master/Resources/Public/Images/placeholder.jpg "Example Placeholder")

## Want to report an issue?

https://github.com/koehlersimon/fallback/issues

## All other requests

**Contact:** https://simon-koehler.com/en/contact

## Do you want to learn TYPO3? Here's what you need:
Video Training TYPO3 9 LTS (German language)
https://www.digistore24.com/redir/246076/GOCHILLA/

## Wanna spend my kids some ice cream?
[![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://paypal.me/typo3freelancer/5)
