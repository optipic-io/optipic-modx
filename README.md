# WebP convert images MODx in 2 clicks - OptiPic CDN ready plugin

> Fully automated process for converting all png and jpeg images to WebP format to the requirements of Google Pagespeed Insights. Solves the problem 'Serve images in next-gen formats'. Easy connection to MODx.

[![Download](https://optipic.io/images/download-button.png)](https://github.com/optipic-io/optipic-modx/releases/download/1.19.0/optipic-1.19.0.transport.zip)

## How to convert to WebP all the images on the MODx> CDN OptiPic — simple solution to the problem "Serve images in next-gen formats"

- [181 reviews](https://optipic.io/en/cdn/reviews/) ⭐⭐⭐⭐⭐
- According to recommendations Google PageSpeed Insights
- [Easy connection in 5 minutes](https://www.youtube.com/watch?v=ABqTQXPTCyM)
- [Video instruction in 2 minutes](https://www.youtube.com/watch?v=ABqTQXPTCyM)
- [Free technical support + installation help](https://optipic.io/get-free-help/?cdn=1)

## Smart WebP convertation on the fly
> What does OptiPic CDN do when trying to request an image from it:

- Returns the WebP version of the image *(if the browser supports WebP format)*
- Returns a compressed version without webp *(if the browser does not support WebP)*
- Makes responsive to mobile screens *(if the image is opened from a mobile)*
- Caches and speeds up loading reducing the load from your hosting
- Protects your images preserving copyright by EXIF and IPTC tags
- Use your own domain name to load images from img.domain.com, etc
- Lazy load images Images load as you scroll through the pages

*Convertation to Webp and image compression occurs in the background and does not slow down the opening of images on the browser.
If the optimized version is not yet ready at the time of the image request, the original version is returned without any processing.*

[![Download](https://optipic.io/images/download-button.png)](https://github.com/optipic-io/optipic-modx/releases/download/1.19.0/optipic-1.19.0.transport.zip)

## Video instruction for configuring the module MODx
[![IMAGE ALT TEXT HERE](https://img.youtube.com/vi/ABqTQXPTCyM/0.jpg)](https://www.youtube.com/watch?v=ABqTQXPTCyM)

## 5 easy steps to connect WebP to MODx
### Step #1: Download plugin MODx WebP
Download and install the official CDN OptiPic plugin for MODx on your site.

### Step #2: Sign up for OptiPic CDN
Register in your OptiPic CDN account and add a new site to your CDN control panel.
![Step 1](https://optipic.io/img/cdn/install-instruction/en/step-2.png)

### Step #3: Copy site ID
Copy the ID of the created website to the clipboard (Ctrl + C)
![Step 1](https://optipic.io/img/cdn/install-instruction/en/step-3.png)

### Step #4: Paste the site ID into the plugin MODx WebP
Go to the settings page of the previously installed plugin on your site.
Paste the copied site ID into the corresponding settings field.

### Step #5: Save your settings
Save plugin settings. Clear the cache in the control panel MODx.
Change other plugin settings if necessary

## Description of plugin settings

- **Site ID in your personal account CDN OptiPic**
  ```
  You can find out your website ID in your CDN OptiPic personal account. 
  Add your site to your account if you have not already done so. 
  To turn off auto-fidelity, just clear the site ID.
  ```

* **Domain list (if images are loaded via absolute URL)**
  ```
  Each on a new line and without specifying the protocol (http/https).
  Examples:
  mydomain.com
  www.mydomain.com
  ```

* **Site pages that do not include auto-replace**
Each on a new line and must start with a slash (/)

* **Replace only URLs of images starting with a mask**
  ```
  Each on a new line and must start with a slash (/)
  Examples:
  /upload/
  /upload/test.jpeg
  ```

* **List of 'srcset' attributes**
  ```
  List of tag attributes, in which you need to replace srcset-markup of images
  What is srcset? 
  Examples: 
  srcset 
  data-srcset 
  ```

* **CDN domain**
  ```
  Domain through which CDN OptiPic will work. 
  You can use your subdomain (img.yourdomain.com, optipic.yourdomain.com, etc.) instead of the standard cdn.optipic.io. 
  To connect your subdomain, contact OptiPic technical support.
  ```
