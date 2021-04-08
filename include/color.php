<div class="magick-header">
<p class="text-center"><a href="#usage">Example Usage</a> • <a href="#models">Color Model Specification</a> • <a href="#color_names">List of Color Names</a></p>

<p class="lead magick-description">A number of ImageMagick options and methods take a color as an argument. The color can then be given as a color name (there is a limited but large set of these; see below) or it can be given as a set of numbers (in decimal or hexadecimal), each corresponding to a channel in an RGB or RGBA color model.  HSL, HSLA, HSB, HSBA, CMYK, or CMYKA color models may also be specified. These topics are briefly described in the sections below.</p>

<p>Use the <a href="<?php echo $_SESSION['RelativePath']?>/../contrib/color-converter.php">Color Converter</a> to supply any valid ImageMagick color specification as described below to see a color swatch of that color and to convert to all the other color models.</p>

<h2><a class="anchor" id="usage"></a>Example Usage</h2>

<p>Each of the following commands produces the same <var>lime</var> border around the image. (Use "double quotes" for Windows.)</p>

<ul><pre class="bg-light"><code>magick -bordercolor lime -border 10 image.jpg image.png
magick -bordercolor '#0f0' -border 10 image.jpg image.png
magick -bordercolor '#00ff00' -border 10 image.jpg image.png
magick -bordercolor 'rgb(0,255,0)' -border 10 image.jpg image.png
magick -bordercolor 'rgb(0,100%,0)' -border 10 image.jpg image.png</code></pre></ul>

<p>The list of recognized color names (for example, <var>aqua</var>, <var>black</var>, <var>blue</var>, <var>fuchsia</var>, <var>gray</var>, <var>green</var>, <var>lime</var>, <var>maroon</var>, <var>navy</var>, <var>olive</var>, <var>purple</var>, <var>red</var>, <var>silver</var>, <var>teal</var>, <var>white</var>, <var>yellow</var>, and others) is shown in a table further below.</p>

<h2><a class="anchor" id="models"></a>Color Model Specification</h2>

<p>The sRGB, CMYK, HSL and HSB color models are used in numerical color specifications. These examples all specify the same red sRGB color:</p>

<ul><pre class="bg-light"><code>#f00                      #rgb
#ff0000                   #rrggbb
#ff0000ff                 #rrggbbaa
#ffff00000000             #rrrrggggbbbb
#ffff00000000ffff         #rrrrggggbbbbaaaa
rgb(255, 0, 0)            an integer in the range 0—255 for each component
rgb(100.0%, 0.0%, 0.0%)   a float in the range 0—100% for each component</code></pre></ul>

<p>The format of an sRGB value in hexadecimal notation is a '#' immediately followed by either three, six, or twelve hexadecimal characters. The three-digit sRGB notation (#rgb) is converted into six-digit form (#rrggbb) by replicating digits, not by adding zeros. For example,  #fb0 expands to #ffbb00. This ensures that white (#ffffff) can be specified with the short notation (#fff) and removes any dependencies on the color depth of the image. Use the hexadecimal notation whenever performance is an issue.  ImageMagick does not need to load the expansive color table to interpret a hexadecimal color, e.g., <code>#000000</code>, but it does if <code>black</code> is used instead.</p>

<p>The format of an sRGB value in the functional notation is 'rgb(<var>r</var>,<var>g</var>,<var>b</var>)',  where  <var>r</var>, <var>g</var>, and <var>b</var> are either three integer or float values in the range 0—255 or three integer or float percentage values in the range 0—100%. The value 255 corresponds to 100%, and to #F or #FF in the hexadecimal notation: rgb(255, 255, 255) = rgb(100%, 100%, 100%) = #FFF = #FFFFFF. Note, as of ImageMagick 7.0.10-53, the commas are no longer necessary and the slash can proceed the alpha value, e.g. <code>rgb(255 128 0 / 50%)</code>.</p>

<p>White space characters are allowed around the numerical values, at least if the entire color argument is enclosed in quotes ('single quotes' for Linux-like systems, "double quotes" for Windows).</p>

<p>The sRGB color model is extended in this specification to include <var>alpha</var> to allow specification of the transparency of a color. These examples all specify the same color:</p>

<ul><pre class="bg-light"><code>rgb(255, 0, 0)                 range 0 - 255
rgba(255, 0, 0, 1.0)           the same, with an explicit alpha value
rgb(100%, 0%, 0%)              range 0.0% - 100.0%
rgba(100%, 0%, 0%, 1.0)        the same, with an explicit alpha value</code></pre></ul>

<p>The format of an RGBA value in the functional notation is 'rgba(<var>r</var>,<var>g</var>,<var>b</var>,<var>a</var>)',  where  <var>r</var>, <var>g</var>, and <var>b</var> are as described above for the RGB functional notation, and where the alpha value <var>a</var> ranges from 0.0 (fully transparent) to 1.0 (fully opaque).</p>

<p>There is also a color called 'none' that is fully transparent.  This color is shorthand for <code>rgba(0, 0, 0, 0.0)</code>.</p>

<p>Non-linear gray values are conveniently defined with a name, single intensity value or an intensity value and an alpha value:</p>

<ul><pre class="bg-light"><code>
gray50            near mid gray
gray(127)         near mid gray
gray(50%)         mid gray
graya(50%, 0.5)   semi-transparent mid gray</code></pre></ul>

<p>For linear gray values add -colorspace RGB -colorspace Gray or -colorspace LinearGray when creating gray colors. The latter is new as of Imagemagick 6.9.9-29 and 7.0.7-17.</p>

<p>The ImageMagick color model also supports hue-saturation-lightness (HSL) and hue-saturation-brightness (HSB) colors as a complement to numerical sRGB colors. HSL colors are encoding as a triple (hue, saturation, lightness). Likewise HSB colors are encoding as a triple (hue, saturation, brightness). HSL or HSB triples are either direct values (hue 0—360, saturation 0—255, lightness or brightness 0—255) or with S,L,B as percentage values relative to these ranges.</p>

<p>The HSB color system is geometrically represented as a cone with its apex pointing downward. Hue is measured around the perimeter. Saturation is measured from the axis outward. Brightness is measured from the apex upward.</p>

<p>The HSL color system is geometrically represented as a stacked double cone with one apex pointing downward and the other pointing upward. The widest ends of both cones are stacked together one on top of the other. Hue is measured around the perimeter. Saturation is measured from the axis outward. Lightness is measured from the bottom apex upward.</p>

<p>See <a href="http://en.wikipedia.org/wiki/HSL_and_HSV">http://en.wikipedia.org/wiki/HSL_and_HSV</a> for more details on HSL and HSB color systems.</p>

<p>Hue is represented as an angle of the color around the circular perimeter of the cone(s) (i.e. the rainbow represented in a circle). Hue values are integers or floats in the range 0—360. By definition red=0=360, and the other colors are spread around the circle, so green=120, blue=240, etc. As an angle, it implicitly wraps around such that -120=240 and 480=120, for instance. (Students of trigonometry would say that "coterminal angles are equivalent" here; an angle <var>θ</var> can be standardized by computing the equivalent angle, <var>θ</var> mod 360.)</p>

<p>Saturation is measure outward from the central axis of the cone(s) toward the perimeter of the cone(s). Saturation may be expressed as an integer or float in the range 0—255 or as an integer or float percentage in the range 0—100. Saturation may be thought of as the absence of any "white" mixed with the base color. Thus 255 or 100% is full saturation and corresponds to a point on the outside surface of the cone (HSB) or double cone (HSL). It will be the most "colorful" region. 0 or 0% is no saturation which results in some shade of gray. It occurs along the central axis of the cone or double cone with black at the bottom apex and white at the top.</p>

<p>Brightness and Lightness also may be represented as integers or floats in the range 0—255 or as integer or float percentages in the range 0—100%. Brightness and Lightness are measured from the bottom apex upward to the top of the cone or double cone along the cone(s) central axis. 0 or 0% corresponds to the bottom apex and 255 or 100% corresponds to the top center of the cone for Brightness and to the top apex of the double cone for Lightness.</p>

<p>The HSB color system is a little easier to understand than the HSL color system. In the HSB color system, black is at the bottom apex and white is at the top center of the cone on the central axis. The most colorful or saturated colors will then be at the outer edge of the top of the cone at the widest part. Thus at Saturation=100% and Brightness=100%</p>

<ul><pre class="bg-light"><code>hsb(0,   100%,  100%)    or    hsb(0,   255,   255)       full red
hsb(120, 100%,  100%)    or    hsb(120, 255,   255)       full green
hsb(120, 100%,  75%)     or    hsb(120, 255,   191.25)    medium green
hsb(120, 100%,  50%)     or    hsb(120, 255,   127.5)     dark green
hsb(120, 100%,  25%)     or    hsb(120, 255,   63.75)     very dark green
hsb(120, 50%,   50%)     or    hsb(120, 127.5, 127.5)     pastel green</code></pre></ul>

<p>In the HSL color system, black is at the bottom apex and white is at the top apex. However, saturation is largest at the middle of the double cone on its outer perimeter and thus at a lightness value of 50%. The most colorful or saturated colors will then be at the outer edge of the double cone at its widest part. Thus at Saturation=100% and Brightness=50%</p>

<ul><pre class="bg-light"><code>hsl(0,   100%,  50%)     or    hsl(0,   255,   127.5)     full red
hsl(120, 100%,  100%)    or    hsl(120, 255,   255)       white
hsl(120, 100%,  75%)     or    hsl(120, 255,   191.25)    pastel green
hsl(120, 100%,  50%)     or    hsl(120, 255,   127.5)     full green
hsl(120, 100%,  25%)     or    hsl(120, 255,   63.75)     dark green
hsl(120, 50%,   50%)     or    hsl(120, 127.5, 127.5)     medium green</code></pre></ul>

<p>One advantage of HSB or HSL over RGB is that it can be more intuitive: you can guess at the colors you want, and then tweak. It is also easier to create sets of matching colors (by keeping the hue the same and varying the brightness or lightness and saturation, for example).</p>

<p>Just as the 'rgb()' functional notation has the 'rgba()' alpha counterpart, the 'hsl()' and 'hsb()' functional notations have their 'hsla()' 'hsba()' alpha counterparts. These examples specify the same color:</p>

<ul><pre class="bg-light"><code>hsb(120, 100%,  100%)              full green in hsb
hsba(120, 100%,  100%,  1.0)       the same, with an alpha value of 1.0
hsb(120, 255,  255)                full green in hsb
hsba(120, 255,  255,  1.0)         the same, with an alpha value of 1.0

hsl(120, 100%,  50%)               full green in hsl
hsla(120, 100%,  50%,  1.0)        the same, with an alpha value of 1.0
hsl(120, 255,  127.5)              full green in hsl
hsla(120, 255,  127.5,  1.0)       the same, with an alpha value of 1.0</code></pre></ul>

<p>For ImageMagick between 6.5.6-6 and 6.9.2-0, HSL (HSB) could only be specified with Hue as percent in range 0—100%, when Saturation and Lightness (Brightness) were also specified as percent in range 0—100%.</p>

<p>Specify the Lab colors like this:</p>
<ul><pre class="bg-light"><code>cielab(62.253188, 23.950124, 48.410653)</code></pre></ul>
<p>Note, the <code>a</code> and <code>b</code> components of any Lab color you specify are biased internally by 50% to ensure it fits in the quantum range (typically 0 to 65535).  The bias is retained when writing to the TIFF and MIFF image formats.  However, the TXT format supports negative pixel values so the bias is removed when writing to this format:</p>
<ul><pre class="bg-light"><code>$ magick xc:cyan -colorspace LAB txt:
# ImageMagick pixel enumeration: 1,1,65535,cielab
0,0: (59711,20409.5,-3632.9)  #E93F4FBA71CF  cielab(91.1132,-48.0855,-14.1358)

$ magick -size 100x100 xc:"cielab(91.1132,-48.0855,-14.1358)" -colorspace sRGB cyan.png</code></pre></ul>

<p>Or specify colors generically with the <code>icc-color</code> keyword, for example:</p>
<ul><pre class="bg-light"><code>
icc-color(cmyk, 0.11, 0.48, 0.83, 0.00)  cymk
icc-color(rgb, 1, 0, 0)                  linear rgb
icc-color(rgb, red)                      linear rgb
icc-color(lineargray, 0.5)               linear gray
icc-color(srgb, 1, 0, 0)                 non-linear rgb
icc-color(srgb, red)                     non-linear rgb
icc-color(gray, 0.5)                     non-linear gray
</code></pre></ul>

<p>Or specify uncalibrated device colors with the <code>device-</code> keyword, for example:</p>
<ul><pre class="bg-light"><code>device-gray(0.5)
device-rgb(0.5, 1.0, 0.0)
device-cmyk(0.11, 0.48, 0.83, 0.00)</code></pre></ul>

<p>ImageMagick also supports wide-gamut color such as <code>Lab</code>, <code>LCH</code>, and <code>Display-P3</code>.</p>

<h2><a class="anchor" id="color_names"></a>List of Color Names</h2>

<p>The table below provides a list of named colors recognized by ImageMagick:</p>

<div class="pre-scrollable">
<table class="table table-sm table-hover">
<tbody>
  <tr>
    <th align="right">Name</th>
    <th align="center">Color</th>
    <th align="left">RGB</th>
    <th align="left">Hex</th>
  </tr>

  <tr>
    <td align="right">snow</td>
    <td align="center" style="background-color: rgb(255, 250, 250)">snow</td>
    <td align="left">rgb(255, 250, 250)</td>
    <td align="left">#FFFAFA</td>
  </tr>

  <tr>
    <td align="right">snow1</td>
    <td align="center" style="background-color: rgb(255, 250, 250)">snow1</td>
    <td align="left">rgb(255, 250, 250)</td>
    <td align="left">#FFFAFA</td>
  </tr>

  <tr>
    <td align="right">snow2</td>
    <td align="center" style="background-color: rgb(238, 233, 233)">snow2</td>
    <td align="left">rgb(238, 233, 233)</td>
    <td align="left">#EEE9E9</td>
  </tr>

  <tr>
    <td align="right">RosyBrown1</td>
    <td align="center" style="background-color: rgb(255, 193, 193)">RosyBrown1</td>
    <td align="left">rgb(255, 193, 193)</td>
    <td align="left">#FFC1C1</td>
  </tr>

  <tr>
    <td align="right">RosyBrown2</td>
    <td align="center" style="background-color: rgb(238, 180, 180)">RosyBrown2</td>
    <td align="left">rgb(238, 180, 180)</td>
    <td align="left">#EEB4B4</td>
  </tr>

  <tr>
    <td align="right">snow3</td>
    <td align="center" style="background-color: rgb(205, 201, 201)">snow3</td>
    <td align="left">rgb(205, 201, 201)</td>
    <td align="left">#CDC9C9</td>
  </tr>

  <tr>
    <td align="right">LightCoral</td>
    <td align="center" style="background-color: rgb(240, 128, 128)">LightCoral</td>
    <td align="left">rgb(240, 128, 128)</td>
    <td align="left">#F08080</td>
  </tr>

  <tr>
    <td align="right">IndianRed1</td>
    <td align="center" style="background-color: rgb(255, 106, 106)">IndianRed1</td>
    <td align="left">rgb(255, 106, 106)</td>
    <td align="left">#FF6A6A</td>
  </tr>

  <tr>
    <td align="right">RosyBrown3</td>
    <td align="center" style="background-color: rgb(205, 155, 155)">RosyBrown3</td>
    <td align="left">rgb(205, 155, 155)</td>
    <td align="left">#CD9B9B</td>
  </tr>

  <tr>
    <td align="right">IndianRed2</td>
    <td align="center" style="background-color: rgb(238, 99,  99)">IndianRed2</td>
    <td align="left">rgb(238, 99,  99)</td>
    <td align="left">#EE6363</td>
  </tr>

  <tr>
    <td align="right">RosyBrown</td>
    <td align="center" style="background-color: rgb(188, 143, 143)">RosyBrown</td>
    <td align="left">rgb(188, 143, 143)</td>
    <td align="left">#BC8F8F</td>
  </tr>

  <tr>
    <td align="right">brown1</td>
    <td align="center" style="background-color: rgb(255, 64,  64)">brown1</td>
    <td align="left">rgb(255, 64,  64)</td>
    <td align="left">#FF4040</td>
  </tr>

  <tr>
    <td align="right">firebrick1</td>
    <td align="center" style="background-color: rgb(255, 48,  48)">firebrick1</td>
    <td align="left">rgb(255, 48,  48)</td>
    <td align="left">#FF3030</td>
  </tr>

  <tr>
    <td align="right">brown2</td>
    <td align="center" style="background-color: rgb(238, 59,  59)">brown2</td>
    <td align="left">rgb(238, 59,  59)</td>
    <td align="left">#EE3B3B</td>
  </tr>

  <tr>
    <td align="right">IndianRed</td>
    <td align="center" style="background-color: rgb(205, 92,  92)">IndianRed</td>
    <td align="left">rgb(205, 92,  92)</td>
    <td align="left">#CD5C5C</td>
  </tr>

  <tr>
    <td align="right">IndianRed3</td>
    <td align="center" style="background-color: rgb(205, 85,  85)">IndianRed3</td>
    <td align="left">rgb(205, 85,  85)</td>
    <td align="left">#CD5555</td>
  </tr>

  <tr>
    <td align="right">firebrick2</td>
    <td align="center" style="background-color: rgb(238, 44,  44)">firebrick2</td>
    <td align="left">rgb(238, 44,  44)</td>
    <td align="left">#EE2C2C</td>
  </tr>

  <tr>
    <td align="right">snow4</td>
    <td align="center" style="background-color: rgb(139, 137, 137)">snow4</td>
    <td align="left">rgb(139, 137, 137)</td>
    <td align="left">#8B8989</td>
  </tr>

  <tr>
    <td align="right">brown3</td>
    <td align="center" style="background-color: rgb(205, 51,  51)">brown3</td>
    <td align="left">rgb(205, 51,  51)</td>
    <td align="left">#CD3333</td>
  </tr>

  <tr>
    <td align="right">red</td>
    <td align="center" style="background-color: rgb(255,  0,   0)">red</td>
    <td align="left">rgb(255,  0,   0)</td>
    <td align="left">#FF0000</td>
  </tr>

  <tr>
    <td align="right">red1</td>
    <td align="center" style="background-color: rgb(255,  0,   0)">red1</td>
    <td align="left">rgb(255,  0,   0)</td>
    <td align="left">#FF0000</td>
  </tr>

  <tr>
    <td align="right">RosyBrown4</td>
    <td align="center" style="background-color: rgb(139, 105, 105)">RosyBrown4</td>
    <td align="left">rgb(139, 105, 105)</td>
    <td align="left">#8B6969</td>
  </tr>

  <tr>
    <td align="right">firebrick3</td>
    <td align="center" style="background-color: rgb(205, 38,  38)">firebrick3</td>
    <td align="left">rgb(205, 38,  38)</td>
    <td align="left">#CD2626</td>
  </tr>

  <tr>
    <td align="right">red2</td>
    <td align="center" style="background-color: rgb(238,  0,   0)">red2</td>
    <td align="left">rgb(238,  0,   0)</td>
    <td align="left">#EE0000</td>
  </tr>

  <tr>
    <td align="right">firebrick</td>
    <td align="center" style="background-color: rgb(178, 34,  34)">firebrick</td>
    <td align="left">rgb(178, 34,  34)</td>
    <td align="left">#B22222</td>
  </tr>

  <tr>
    <td align="right">brown</td>
    <td align="center" style="background-color: rgb(165, 42,  42)">brown</td>
    <td align="left">rgb(165, 42,  42)</td>
    <td align="left">#A52A2A</td>
  </tr>

  <tr>
    <td align="right">red3</td>
    <td align="center" style="background-color: rgb(205,  0,   0)">red3</td>
    <td align="left">rgb(205,  0,   0)</td>
    <td align="left">#CD0000</td>
  </tr>

  <tr>
    <td align="right">IndianRed4</td>
    <td align="center" style="background-color: rgb(139, 58,  58)">IndianRed4</td>
    <td align="left">rgb(139, 58,  58)</td>
    <td align="left">#8B3A3A</td>
  </tr>

  <tr>
    <td align="right">brown4</td>
    <td align="center" style="background-color: rgb(139, 35,  35)">brown4</td>
    <td align="left">rgb(139, 35,  35)</td>
    <td align="left">#8B2323</td>
  </tr>

  <tr>
    <td align="right">firebrick4</td>
    <td align="center" style="background-color: rgb(139, 26,  26)">firebrick4</td>
    <td align="left">rgb(139, 26,  26)</td>
    <td align="left">#8B1A1A</td>
  </tr>

  <tr>
    <td align="right">DarkRed</td>
    <td align="center" style="background-color: rgb(139,  0,   0)">DarkRed</td>
    <td align="left">rgb(139,  0,   0)</td>
    <td align="left">#8B0000</td>
  </tr>

  <tr>
    <td align="right">red4</td>
    <td align="center" style="background-color: rgb(139,  0,   0)">red4</td>
    <td align="left">rgb(139,  0,   0)</td>
    <td align="left">#8B0000</td>
  </tr>

  <tr>
    <td align="right">maroon</td>
    <td align="center" style="background-color: rgb(128,  0,   0)">maroon (SVG compliance)</td>
    <td align="left">rgb(128,  0,   0)</td>
    <td align="left">#800000</td>
  </tr>

  <tr>
    <td align="right">LightPink1</td>
    <td align="center" style="background-color: rgb(255, 174, 185)">LightPink1</td>
    <td align="left">rgb(255, 174, 185)</td>
    <td align="left">#FFAEB9</td>
  </tr>

  <tr>
    <td align="right">LightPink3</td>
    <td align="center" style="background-color: rgb(205, 140, 149)">LightPink3</td>
    <td align="left">rgb(205, 140, 149)</td>
    <td align="left">#CD8C95</td>
  </tr>

  <tr>
    <td align="right">LightPink4</td>
    <td align="center" style="background-color: rgb(139, 95, 101)">LightPink4</td>
    <td align="left">rgb(139, 95, 101)</td>
    <td align="left">#8B5F65</td>
  </tr>

  <tr>
    <td align="right">LightPink2</td>
    <td align="center" style="background-color: rgb(238, 162, 173)">LightPink2</td>
    <td align="left">rgb(238, 162, 173)</td>
    <td align="left">#EEA2AD</td>
  </tr>

  <tr>
    <td align="right">LightPink</td>
    <td align="center" style="background-color: rgb(255, 182, 193)">LightPink</td>
    <td align="left">rgb(255, 182, 193)</td>
    <td align="left">#FFB6C1</td>
  </tr>

  <tr>
    <td align="right">pink</td>
    <td align="center" style="background-color: rgb(255, 192, 203)">pink</td>
    <td align="left">rgb(255, 192, 203)</td>
    <td align="left">#FFC0CB</td>
  </tr>

  <tr>
    <td align="right">crimson</td>
    <td align="center" style="background-color: rgb(220, 20,  60)">crimson</td>
    <td align="left">rgb(220, 20,  60)</td>
    <td align="left">#DC143C</td>
  </tr>

  <tr>
    <td align="right">pink1</td>
    <td align="center" style="background-color: rgb(255, 181, 197)">pink1</td>
    <td align="left">rgb(255, 181, 197)</td>
    <td align="left">#FFB5C5</td>
  </tr>

  <tr>
    <td align="right">pink2</td>
    <td align="center" style="background-color: rgb(238, 169, 184)">pink2</td>
    <td align="left">rgb(238, 169, 184)</td>
    <td align="left">#EEA9B8</td>
  </tr>

  <tr>
    <td align="right">pink3</td>
    <td align="center" style="background-color: rgb(205, 145, 158)">pink3</td>
    <td align="left">rgb(205, 145, 158)</td>
    <td align="left">#CD919E</td>
  </tr>

  <tr>
    <td align="right">pink4</td>
    <td align="center" style="background-color: rgb(139, 99, 108)">pink4</td>
    <td align="left">rgb(139, 99, 108)</td>
    <td align="left">#8B636C</td>
  </tr>

  <tr>
    <td align="right">PaleVioletRed4</td>
    <td align="center" style="background-color: rgb(139, 71,  93)">PaleVioletRed4</td>
    <td align="left">rgb(139, 71,  93)</td>
    <td align="left">#8B475D</td>
  </tr>

  <tr>
    <td align="right">PaleVioletRed</td>
    <td align="center" style="background-color: rgb(219, 112, 147)">PaleVioletRed</td>
    <td align="left">rgb(219, 112, 147)</td>
    <td align="left">#DB7093</td>
  </tr>

  <tr>
    <td align="right">PaleVioletRed2</td>
    <td align="center" style="background-color: rgb(238, 121, 159)">PaleVioletRed2</td>
    <td align="left">rgb(238, 121, 159)</td>
    <td align="left">#EE799F</td>
  </tr>

  <tr>
    <td align="right">PaleVioletRed1</td>
    <td align="center" style="background-color: rgb(255, 130, 171)">PaleVioletRed1</td>
    <td align="left">rgb(255, 130, 171)</td>
    <td align="left">#FF82AB</td>
  </tr>

  <tr>
    <td align="right">PaleVioletRed3</td>
    <td align="center" style="background-color: rgb(205, 104, 137)">PaleVioletRed3</td>
    <td align="left">rgb(205, 104, 137)</td>
    <td align="left">#CD6889</td>
  </tr>

  <tr>
    <td align="right">LavenderBlush</td>
    <td align="center" style="background-color: rgb(255, 240, 245)">LavenderBlush</td>
    <td align="left">rgb(255, 240, 245)</td>
    <td align="left">#FFF0F5</td>
  </tr>

  <tr>
    <td align="right">LavenderBlush1</td>
    <td align="center" style="background-color: rgb(255, 240, 245)">LavenderBlush1</td>
    <td align="left">rgb(255, 240, 245)</td>
    <td align="left">#FFF0F5</td>
  </tr>

  <tr>
    <td align="right">LavenderBlush3</td>
    <td align="center" style="background-color: rgb(205, 193, 197)">LavenderBlush3</td>
    <td align="left">rgb(205, 193, 197)</td>
    <td align="left">#CDC1C5</td>
  </tr>

  <tr>
    <td align="right">LavenderBlush2</td>
    <td align="center" style="background-color: rgb(238, 224, 229)">LavenderBlush2</td>
    <td align="left">rgb(238, 224, 229)</td>
    <td align="left">#EEE0E5</td>
  </tr>

  <tr>
    <td align="right">LavenderBlush4</td>
    <td align="center" style="background-color: rgb(139, 131, 134)">LavenderBlush4</td>
    <td align="left">rgb(139, 131, 134)</td>
    <td align="left">#8B8386</td>
  </tr>

  <tr>
    <td align="right">maroon</td>
    <td align="center" style="background-color: rgb(176, 48,  96)">maroon (X11 compliance)</td>
    <td align="left">rgb(176, 48,  96)</td>
    <td align="left">#B03060</td>
  </tr>

  <tr>
    <td align="right">HotPink3</td>
    <td align="center" style="background-color: rgb(205, 96, 144)">HotPink3</td>
    <td align="left">rgb(205, 96, 144)</td>
    <td align="left">#CD6090</td>
  </tr>

  <tr>
    <td align="right">VioletRed3</td>
    <td align="center" style="background-color: rgb(205, 50, 120)">VioletRed3</td>
    <td align="left">rgb(205, 50, 120)</td>
    <td align="left">#CD3278</td>
  </tr>

  <tr>
    <td align="right">VioletRed1</td>
    <td align="center" style="background-color: rgb(255, 62, 150)">VioletRed1</td>
    <td align="left">rgb(255, 62, 150)</td>
    <td align="left">#FF3E96</td>
  </tr>

  <tr>
    <td align="right">VioletRed2</td>
    <td align="center" style="background-color: rgb(238, 58, 140)">VioletRed2</td>
    <td align="left">rgb(238, 58, 140)</td>
    <td align="left">#EE3A8C</td>
  </tr>

  <tr>
    <td align="right">VioletRed4</td>
    <td align="center" style="background-color: rgb(139, 34,  82)">VioletRed4</td>
    <td align="left">rgb(139, 34,  82)</td>
    <td align="left">#8B2252</td>
  </tr>

  <tr>
    <td align="right">HotPink2</td>
    <td align="center" style="background-color: rgb(238, 106, 167)">HotPink2</td>
    <td align="left">rgb(238, 106, 167)</td>
    <td align="left">#EE6AA7</td>
  </tr>

  <tr>
    <td align="right">HotPink1</td>
    <td align="center" style="background-color: rgb(255, 110, 180)">HotPink1</td>
    <td align="left">rgb(255, 110, 180)</td>
    <td align="left">#FF6EB4</td>
  </tr>

  <tr>
    <td align="right">HotPink4</td>
    <td align="center" style="background-color: rgb(139, 58,  98)">HotPink4</td>
    <td align="left">rgb(139, 58,  98)</td>
    <td align="left">#8B3A62</td>
  </tr>

  <tr>
    <td align="right">HotPink</td>
    <td align="center" style="background-color: rgb(255, 105, 180)">HotPink</td>
    <td align="left">rgb(255, 105, 180)</td>
    <td align="left">#FF69B4</td>
  </tr>

  <tr>
    <td align="right">DeepPink</td>
    <td align="center" style="background-color: rgb(255, 20, 147)">DeepPink</td>
    <td align="left">rgb(255, 20, 147)</td>
    <td align="left">#FF1493</td>
  </tr>

  <tr>
    <td align="right">DeepPink1</td>
    <td align="center" style="background-color: rgb(255, 20, 147)">DeepPink1</td>
    <td align="left">rgb(255, 20, 147)</td>
    <td align="left">#FF1493</td>
  </tr>

  <tr>
    <td align="right">DeepPink2</td>
    <td align="center" style="background-color: rgb(238, 18, 137)">DeepPink2</td>
    <td align="left">rgb(238, 18, 137)</td>
    <td align="left">#EE1289</td>
  </tr>

  <tr>
    <td align="right">DeepPink3</td>
    <td align="center" style="background-color: rgb(205, 16, 118)">DeepPink3</td>
    <td align="left">rgb(205, 16, 118)</td>
    <td align="left">#CD1076</td>
  </tr>

  <tr>
    <td align="right">DeepPink4</td>
    <td align="center" style="background-color: rgb(139, 10,  80)">DeepPink4</td>
    <td align="left">rgb(139, 10,  80)</td>
    <td align="left">#8B0A50</td>
  </tr>

  <tr>
    <td align="right">maroon1</td>
    <td align="center" style="background-color: rgb(255, 52, 179)">maroon1</td>
    <td align="left">rgb(255, 52, 179)</td>
    <td align="left">#FF34B3</td>
  </tr>

  <tr>
    <td align="right">maroon2</td>
    <td align="center" style="background-color: rgb(238, 48, 167)">maroon2</td>
    <td align="left">rgb(238, 48, 167)</td>
    <td align="left">#EE30A7</td>
  </tr>

  <tr>
    <td align="right">maroon3</td>
    <td align="center" style="background-color: rgb(205, 41, 144)">maroon3</td>
    <td align="left">rgb(205, 41, 144)</td>
    <td align="left">#CD2990</td>
  </tr>

  <tr>
    <td align="right">maroon4</td>
    <td align="center" style="background-color: rgb(139, 28,  98)">maroon4</td>
    <td align="left">rgb(139, 28,  98)</td>
    <td align="left">#8B1C62</td>
  </tr>

  <tr>
    <td align="right">MediumVioletRed</td>
    <td align="center" style="background-color: rgb(199, 21, 133)">MediumVioletRed</td>
    <td align="left">rgb(199, 21, 133)</td>
    <td align="left">#C71585</td>
  </tr>

  <tr>
    <td align="right">VioletRed</td>
    <td align="center" style="background-color: rgb(208, 32, 144)">VioletRed</td>
    <td align="left">rgb(208, 32, 144)</td>
    <td align="left">#D02090</td>
  </tr>

  <tr>
    <td align="right">orchid2</td>
    <td align="center" style="background-color: rgb(238, 122, 233)">orchid2</td>
    <td align="left">rgb(238, 122, 233)</td>
    <td align="left">#EE7AE9</td>
  </tr>

  <tr>
    <td align="right">orchid</td>
    <td align="center" style="background-color: rgb(218, 112, 214)">orchid</td>
    <td align="left">rgb(218, 112, 214)</td>
    <td align="left">#DA70D6</td>
  </tr>

  <tr>
    <td align="right">orchid1</td>
    <td align="center" style="background-color: rgb(255, 131, 250)">orchid1</td>
    <td align="left">rgb(255, 131, 250)</td>
    <td align="left">#FF83FA</td>
  </tr>

  <tr>
    <td align="right">orchid3</td>
    <td align="center" style="background-color: rgb(205, 105, 201)">orchid3</td>
    <td align="left">rgb(205, 105, 201)</td>
    <td align="left">#CD69C9</td>
  </tr>

  <tr>
    <td align="right">orchid4</td>
    <td align="center" style="background-color: rgb(139, 71, 137)">orchid4</td>
    <td align="left">rgb(139, 71, 137)</td>
    <td align="left">#8B4789</td>
  </tr>

  <tr>
    <td align="right">thistle1</td>
    <td align="center" style="background-color: rgb(255, 225, 255)">thistle1</td>
    <td align="left">rgb(255, 225, 255)</td>
    <td align="left">#FFE1FF</td>
  </tr>

  <tr>
    <td align="right">thistle2</td>
    <td align="center" style="background-color: rgb(238, 210, 238)">thistle2</td>
    <td align="left">rgb(238, 210, 238)</td>
    <td align="left">#EED2EE</td>
  </tr>

  <tr>
    <td align="right">plum1</td>
    <td align="center" style="background-color: rgb(255, 187, 255)">plum1</td>
    <td align="left">rgb(255, 187, 255)</td>
    <td align="left">#FFBBFF</td>
  </tr>

  <tr>
    <td align="right">plum2</td>
    <td align="center" style="background-color: rgb(238, 174, 238)">plum2</td>
    <td align="left">rgb(238, 174, 238)</td>
    <td align="left">#EEAEEE</td>
  </tr>

  <tr>
    <td align="right">thistle</td>
    <td align="center" style="background-color: rgb(216, 191, 216)">thistle</td>
    <td align="left">rgb(216, 191, 216)</td>
    <td align="left">#D8BFD8</td>
  </tr>

  <tr>
    <td align="right">thistle3</td>
    <td align="center" style="background-color: rgb(205, 181, 205)">thistle3</td>
    <td align="left">rgb(205, 181, 205)</td>
    <td align="left">#CDB5CD</td>
  </tr>

  <tr>
    <td align="right">plum</td>
    <td align="center" style="background-color: rgb(221, 160, 221)">plum</td>
    <td align="left">rgb(221, 160, 221)</td>
    <td align="left">#DDA0DD</td>
  </tr>

  <tr>
    <td align="right">violet</td>
    <td align="center" style="background-color: rgb(238, 130, 238)">violet</td>
    <td align="left">rgb(238, 130, 238)</td>
    <td align="left">#EE82EE</td>
  </tr>

  <tr>
    <td align="right">plum3</td>
    <td align="center" style="background-color: rgb(205, 150, 205)">plum3</td>
    <td align="left">rgb(205, 150, 205)</td>
    <td align="left">#CD96CD</td>
  </tr>

  <tr>
    <td align="right">thistle4</td>
    <td align="center" style="background-color: rgb(139, 123, 139)">thistle4</td>
    <td align="left">rgb(139, 123, 139)</td>
    <td align="left">#8B7B8B</td>
  </tr>

  <tr>
    <td align="right">fuchsia</td>
    <td align="center" style="background-color: rgb(255,  0, 255)">fuchsia</td>
    <td align="left">rgb(255,  0, 255)</td>
    <td align="left">#FF00FF</td>
  </tr>

  <tr>
    <td align="right">magenta</td>
    <td align="center" style="background-color: rgb(255,  0, 255)">magenta</td>
    <td align="left">rgb(255,  0, 255)</td>
    <td align="left">#FF00FF</td>
  </tr>

  <tr>
    <td align="right">magenta1</td>
    <td align="center" style="background-color: rgb(255,  0, 255)">magenta1</td>
    <td align="left">rgb(255,  0, 255)</td>
    <td align="left">#FF00FF</td>
  </tr>

  <tr>
    <td align="right">plum4</td>
    <td align="center" style="background-color: rgb(139, 102, 139)">plum4</td>
    <td align="left">rgb(139, 102, 139)</td>
    <td align="left">#8B668B</td>
  </tr>

  <tr>
    <td align="right">magenta2</td>
    <td align="center" style="background-color: rgb(238,  0, 238)">magenta2</td>
    <td align="left">rgb(238,  0, 238)</td>
    <td align="left">#EE00EE</td>
  </tr>

  <tr>
    <td align="right">magenta3</td>
    <td align="center" style="background-color: rgb(205,  0, 205)">magenta3</td>
    <td align="left">rgb(205,  0, 205)</td>
    <td align="left">#CD00CD</td>
  </tr>

  <tr>
    <td align="right">DarkMagenta</td>
    <td align="center" style="background-color: rgb(139,  0, 139)">DarkMagenta</td>
    <td align="left">rgb(139,  0, 139)</td>
    <td align="left">#8B008B</td>
  </tr>

  <tr>
    <td align="right">magenta4</td>
    <td align="center" style="background-color: rgb(139,  0, 139)">magenta4</td>
    <td align="left">rgb(139,  0, 139)</td>
    <td align="left">#8B008B</td>
  </tr>

  <tr>
    <td align="right">purple</td>
    <td align="center" style="background-color: rgb(128,  0, 128)">purple (SVG compliance)</td>
    <td align="left">rgb(128,  0, 128)</td>
    <td align="left">#800080</td>
  </tr>

  <tr>
    <td align="right">MediumOrchid</td>
    <td align="center" style="background-color: rgb(186, 85, 211)">MediumOrchid</td>
    <td align="left">rgb(186, 85, 211)</td>
    <td align="left">#BA55D3</td>
  </tr>

  <tr>
    <td align="right">MediumOrchid1</td>
    <td align="center" style="background-color: rgb(224, 102, 255)">MediumOrchid1</td>
    <td align="left">rgb(224, 102, 255)</td>
    <td align="left">#E066FF</td>
  </tr>

  <tr>
    <td align="right">MediumOrchid2</td>
    <td align="center" style="background-color: rgb(209, 95, 238)">MediumOrchid2</td>
    <td align="left">rgb(209, 95, 238)</td>
    <td align="left">#D15FEE</td>
  </tr>

  <tr>
    <td align="right">MediumOrchid3</td>
    <td align="center" style="background-color: rgb(180, 82, 205)">MediumOrchid3</td>
    <td align="left">rgb(180, 82, 205)</td>
    <td align="left">#B452CD</td>
  </tr>

  <tr>
    <td align="right">MediumOrchid4</td>
    <td align="center" style="background-color: rgb(122, 55, 139)">MediumOrchid4</td>
    <td align="left">rgb(122, 55, 139)</td>
    <td align="left">#7A378B</td>
  </tr>

  <tr>
    <td align="right">DarkViolet</td>
    <td align="center" style="background-color: rgb(148,  0, 211)">DarkViolet</td>
    <td align="left">rgb(148,  0, 211)</td>
    <td align="left">#9400D3</td>
  </tr>

  <tr>
    <td align="right">DarkOrchid</td>
    <td align="center" style="background-color: rgb(153, 50, 204)">DarkOrchid</td>
    <td align="left">rgb(153, 50, 204)</td>
    <td align="left">#9932CC</td>
  </tr>

  <tr>
    <td align="right">DarkOrchid1</td>
    <td align="center" style="background-color: rgb(191, 62, 255)">DarkOrchid1</td>
    <td align="left">rgb(191, 62, 255)</td>
    <td align="left">#BF3EFF</td>
  </tr>

  <tr>
    <td align="right">DarkOrchid3</td>
    <td align="center" style="background-color: rgb(154, 50, 205)">DarkOrchid3</td>
    <td align="left">rgb(154, 50, 205)</td>
    <td align="left">#9A32CD</td>
  </tr>

  <tr>
    <td align="right">DarkOrchid2</td>
    <td align="center" style="background-color: rgb(178, 58, 238)">DarkOrchid2</td>
    <td align="left">rgb(178, 58, 238)</td>
    <td align="left">#B23AEE</td>
  </tr>

  <tr>
    <td align="right">DarkOrchid4</td>
    <td align="center" style="background-color: rgb(104, 34, 139)">DarkOrchid4</td>
    <td align="left">rgb(104, 34, 139)</td>
    <td align="left">#68228B</td>
  </tr>

  <tr>
    <td align="right">purple</td>
    <td align="center" style="background-color: rgb(160, 32, 240)">purple (X11 compliance)</td>
    <td align="left">rgb(160, 32, 240)</td>
    <td align="left">#A020F0</td>
  </tr>

  <tr>
    <td align="right">indigo</td>
    <td align="center" style="background-color: rgb( 75,  0, 130)">indigo</td>
    <td align="left">rgb( 75,  0, 130)</td>
    <td align="left">#4B0082</td>
  </tr>

  <tr>
    <td align="right">BlueViolet</td>
    <td align="center" style="background-color: rgb(138, 43, 226)">BlueViolet</td>
    <td align="left">rgb(138, 43, 226)</td>
    <td align="left">#8A2BE2</td>
  </tr>

  <tr>
    <td align="right">purple2</td>
    <td align="center" style="background-color: rgb(145, 44, 238)">purple2</td>
    <td align="left">rgb(145, 44, 238)</td>
    <td align="left">#912CEE</td>
  </tr>

  <tr>
    <td align="right">purple3</td>
    <td align="center" style="background-color: rgb(125, 38, 205)">purple3</td>
    <td align="left">rgb(125, 38, 205)</td>
    <td align="left">#7D26CD</td>
  </tr>

  <tr>
    <td align="right">purple4</td>
    <td align="center" style="background-color: rgb( 85, 26, 139)">purple4</td>
    <td align="left">rgb( 85, 26, 139)</td>
    <td align="left">#551A8B</td>
  </tr>

  <tr>
    <td align="right">purple1</td>
    <td align="center" style="background-color: rgb(155, 48, 255)">purple1</td>
    <td align="left">rgb(155, 48, 255)</td>
    <td align="left">#9B30FF</td>
  </tr>

  <tr>
    <td align="right">MediumPurple</td>
    <td align="center" style="background-color: rgb(147, 112, 219)">MediumPurple</td>
    <td align="left">rgb(147, 112, 219)</td>
    <td align="left">#9370DB</td>
  </tr>

  <tr>
    <td align="right">MediumPurple1</td>
    <td align="center" style="background-color: rgb(171, 130, 255)">MediumPurple1</td>
    <td align="left">rgb(171, 130, 255)</td>
    <td align="left">#AB82FF</td>
  </tr>

  <tr>
    <td align="right">MediumPurple2</td>
    <td align="center" style="background-color: rgb(159, 121, 238)">MediumPurple2</td>
    <td align="left">rgb(159, 121, 238)</td>
    <td align="left">#9F79EE</td>
  </tr>

  <tr>
    <td align="right">MediumPurple3</td>
    <td align="center" style="background-color: rgb(137, 104, 205)">MediumPurple3</td>
    <td align="left">rgb(137, 104, 205)</td>
    <td align="left">#8968CD</td>
  </tr>

  <tr>
    <td align="right">MediumPurple4</td>
    <td align="center" style="background-color: rgb( 93, 71, 139)">MediumPurple4</td>
    <td align="left">rgb( 93, 71, 139)</td>
    <td align="left">#5D478B</td>
  </tr>

  <tr>
    <td align="right">DarkSlateBlue</td>
    <td align="center" style="background-color: rgb( 72, 61, 139)">DarkSlateBlue</td>
    <td align="left">rgb( 72, 61, 139)</td>
    <td align="left">#483D8B</td>
  </tr>

  <tr>
    <td align="right">LightSlateBlue</td>
    <td align="center" style="background-color: rgb(132, 112, 255)">LightSlateBlue</td>
    <td align="left">rgb(132, 112, 255)</td>
    <td align="left">#8470FF</td>
  </tr>

  <tr>
    <td align="right">MediumSlateBlue</td>
    <td align="center" style="background-color: rgb(123, 104, 238)">MediumSlateBlue</td>
    <td align="left">rgb(123, 104, 238)</td>
    <td align="left">#7B68EE</td>
  </tr>

  <tr>
    <td align="right">SlateBlue</td>
    <td align="center" style="background-color: rgb(106, 90, 205)">SlateBlue</td>
    <td align="left">rgb(106, 90, 205)</td>
    <td align="left">#6A5ACD</td>
  </tr>

  <tr>
    <td align="right">SlateBlue1</td>
    <td align="center" style="background-color: rgb(131, 111, 255)">SlateBlue1</td>
    <td align="left">rgb(131, 111, 255)</td>
    <td align="left">#836FFF</td>
  </tr>

  <tr>
    <td align="right">SlateBlue2</td>
    <td align="center" style="background-color: rgb(122, 103, 238)">SlateBlue2</td>
    <td align="left">rgb(122, 103, 238)</td>
    <td align="left">#7A67EE</td>
  </tr>

  <tr>
    <td align="right">SlateBlue3</td>
    <td align="center" style="background-color: rgb(105, 89, 205)">SlateBlue3</td>
    <td align="left">rgb(105, 89, 205)</td>
    <td align="left">#6959CD</td>
  </tr>

  <tr>
    <td align="right">SlateBlue4</td>
    <td align="center" style="background-color: rgb( 71, 60, 139)">SlateBlue4</td>
    <td align="left">rgb( 71, 60, 139)</td>
    <td align="left">#473C8B</td>
  </tr>

  <tr>
    <td align="right">GhostWhite</td>
    <td align="center" style="background-color: rgb(248, 248, 255)">GhostWhite</td>
    <td align="left">rgb(248, 248, 255)</td>
    <td align="left">#F8F8FF</td>
  </tr>

  <tr>
    <td align="right">lavender</td>
    <td align="center" style="background-color: rgb(230, 230, 250)">lavender</td>
    <td align="left">rgb(230, 230, 250)</td>
    <td align="left">#E6E6FA</td>
  </tr>

  <tr>
    <td align="right">blue</td>
    <td align="center" style="background-color: rgb(  0,  0, 255)">blue</td>
    <td align="left">rgb(  0,  0, 255)</td>
    <td align="left">#0000FF</td>
  </tr>

  <tr>
    <td align="right">blue1</td>
    <td align="center" style="background-color: rgb(  0,  0, 255)">blue1</td>
    <td align="left">rgb(  0,  0, 255)</td>
    <td align="left">#0000FF</td>
  </tr>

  <tr>
    <td align="right">blue2</td>
    <td align="center" style="background-color: rgb(  0,  0, 238)">blue2</td>
    <td align="left">rgb(  0,  0, 238)</td>
    <td align="left">#0000EE</td>
  </tr>

  <tr>
    <td align="right">blue3</td>
    <td align="center" style="background-color: rgb(  0,  0, 205)">blue3</td>
    <td align="left">rgb(  0,  0, 205)</td>
    <td align="left">#0000CD</td>
  </tr>

  <tr>
    <td align="right">MediumBlue</td>
    <td align="center" style="background-color: rgb(  0,  0, 205)">MediumBlue</td>
    <td align="left">rgb(  0,  0, 205)</td>
    <td align="left">#0000CD</td>
  </tr>

  <tr>
    <td align="right">blue4</td>
    <td align="center" style="background-color: rgb(  0,  0, 139)">blue4</td>
    <td align="left">rgb(  0,  0, 139)</td>
    <td align="left">#00008B</td>
  </tr>

  <tr>
    <td align="right">DarkBlue</td>
    <td align="center" style="background-color: rgb(  0,  0, 139)">DarkBlue</td>
    <td align="left">rgb(  0,  0, 139)</td>
    <td align="left">#00008B</td>
  </tr>

  <tr>
    <td align="right">MidnightBlue</td>
    <td align="center" style="background-color: rgb( 25, 25, 112)">MidnightBlue</td>
    <td align="left">rgb( 25, 25, 112)</td>
    <td align="left">#191970</td>
  </tr>

  <tr>
    <td align="right">navy</td>
    <td align="center" style="background-color: rgb(  0,  0, 128)">navy</td>
    <td align="left">rgb(  0,  0, 128)</td>
    <td align="left">#000080</td>
  </tr>

  <tr>
    <td align="right">NavyBlue</td>
    <td align="center" style="background-color: rgb(  0,  0, 128)">NavyBlue</td>
    <td align="left">rgb(  0,  0, 128)</td>
    <td align="left">#000080</td>
  </tr>

  <tr>
    <td align="right">RoyalBlue</td>
    <td align="center" style="background-color: rgb( 65, 105, 225)">RoyalBlue</td>
    <td align="left">rgb( 65, 105, 225)</td>
    <td align="left">#4169E1</td>
  </tr>

  <tr>
    <td align="right">RoyalBlue1</td>
    <td align="center" style="background-color: rgb( 72, 118, 255)">RoyalBlue1</td>
    <td align="left">rgb( 72, 118, 255)</td>
    <td align="left">#4876FF</td>
  </tr>

  <tr>
    <td align="right">RoyalBlue2</td>
    <td align="center" style="background-color: rgb( 67, 110, 238)">RoyalBlue2</td>
    <td align="left">rgb( 67, 110, 238)</td>
    <td align="left">#436EEE</td>
  </tr>

  <tr>
    <td align="right">RoyalBlue3</td>
    <td align="center" style="background-color: rgb( 58, 95, 205)">RoyalBlue3</td>
    <td align="left">rgb( 58, 95, 205)</td>
    <td align="left">#3A5FCD</td>
  </tr>

  <tr>
    <td align="right">RoyalBlue4</td>
    <td align="center" style="background-color: rgb( 39, 64, 139)">RoyalBlue4</td>
    <td align="left">rgb( 39, 64, 139)</td>
    <td align="left">#27408B</td>
  </tr>

  <tr>
    <td align="right">CornflowerBlue</td>
    <td align="center" style="background-color: rgb(100, 149, 237)">CornflowerBlue</td>
    <td align="left">rgb(100, 149, 237)</td>
    <td align="left">#6495ED</td>
  </tr>

  <tr>
    <td align="right">LightSteelBlue</td>
    <td align="center" style="background-color: rgb(176, 196, 222)">LightSteelBlue</td>
    <td align="left">rgb(176, 196, 222)</td>
    <td align="left">#B0C4DE</td>
  </tr>

  <tr>
    <td align="right">LightSteelBlue1</td>
    <td align="center" style="background-color: rgb(202, 225, 255)">LightSteelBlue1</td>
    <td align="left">rgb(202, 225, 255)</td>
    <td align="left">#CAE1FF</td>
  </tr>

  <tr>
    <td align="right">LightSteelBlue2</td>
    <td align="center" style="background-color: rgb(188, 210, 238)">LightSteelBlue2</td>
    <td align="left">rgb(188, 210, 238)</td>
    <td align="left">#BCD2EE</td>
  </tr>

  <tr>
    <td align="right">LightSteelBlue3</td>
    <td align="center" style="background-color: rgb(162, 181, 205)">LightSteelBlue3</td>
    <td align="left">rgb(162, 181, 205)</td>
    <td align="left">#A2B5CD</td>
  </tr>

  <tr>
    <td align="right">LightSteelBlue4</td>
    <td align="center" style="background-color: rgb(110, 123, 139)">LightSteelBlue4</td>
    <td align="left">rgb(110, 123, 139)</td>
    <td align="left">#6E7B8B</td>
  </tr>

  <tr>
    <td align="right">SlateGray4</td>
    <td align="center" style="background-color: rgb(108, 123, 139)">SlateGray4</td>
    <td align="left">rgb(108, 123, 139)</td>
    <td align="left">#6C7B8B</td>
  </tr>

  <tr>
    <td align="right">SlateGray1</td>
    <td align="center" style="background-color: rgb(198, 226, 255)">SlateGray1</td>
    <td align="left">rgb(198, 226, 255)</td>
    <td align="left">#C6E2FF</td>
  </tr>

  <tr>
    <td align="right">SlateGray2</td>
    <td align="center" style="background-color: rgb(185, 211, 238)">SlateGray2</td>
    <td align="left">rgb(185, 211, 238)</td>
    <td align="left">#B9D3EE</td>
  </tr>

  <tr>
    <td align="right">SlateGray3</td>
    <td align="center" style="background-color: rgb(159, 182, 205)">SlateGray3</td>
    <td align="left">rgb(159, 182, 205)</td>
    <td align="left">#9FB6CD</td>
  </tr>

  <tr>
    <td align="right">LightSlateGray</td>
    <td align="center" style="background-color: rgb(119, 136, 153)">LightSlateGray</td>
    <td align="left">rgb(119, 136, 153)</td>
    <td align="left">#778899</td>
  </tr>

  <tr>
    <td align="right">LightSlateGrey</td>
    <td align="center" style="background-color: rgb(119, 136, 153)">LightSlateGrey</td>
    <td align="left">rgb(119, 136, 153)</td>
    <td align="left">#778899</td>
  </tr>

  <tr>
    <td align="right">SlateGray</td>
    <td align="center" style="background-color: rgb(112, 128, 144)">SlateGray</td>
    <td align="left">rgb(112, 128, 144)</td>
    <td align="left">#708090</td>
  </tr>

  <tr>
    <td align="right">SlateGrey</td>
    <td align="center" style="background-color: rgb(112, 128, 144)">SlateGrey</td>
    <td align="left">rgb(112, 128, 144)</td>
    <td align="left">#708090</td>
  </tr>

  <tr>
    <td align="right">DodgerBlue</td>
    <td align="center" style="background-color: rgb( 30, 144, 255)">DodgerBlue</td>
    <td align="left">rgb( 30, 144, 255)</td>
    <td align="left">#1E90FF</td>
  </tr>

  <tr>
    <td align="right">DodgerBlue1</td>
    <td align="center" style="background-color: rgb( 30, 144, 255)">DodgerBlue1</td>
    <td align="left">rgb( 30, 144, 255)</td>
    <td align="left">#1E90FF</td>
  </tr>

  <tr>
    <td align="right">DodgerBlue2</td>
    <td align="center" style="background-color: rgb( 28, 134, 238)">DodgerBlue2</td>
    <td align="left">rgb( 28, 134, 238)</td>
    <td align="left">#1C86EE</td>
  </tr>

  <tr>
    <td align="right">DodgerBlue4</td>
    <td align="center" style="background-color: rgb( 16, 78, 139)">DodgerBlue4</td>
    <td align="left">rgb( 16, 78, 139)</td>
    <td align="left">#104E8B</td>
  </tr>

  <tr>
    <td align="right">DodgerBlue3</td>
    <td align="center" style="background-color: rgb( 24, 116, 205)">DodgerBlue3</td>
    <td align="left">rgb( 24, 116, 205)</td>
    <td align="left">#1874CD</td>
  </tr>

  <tr>
    <td align="right">AliceBlue</td>
    <td align="center" style="background-color: rgb(240, 248, 255)">AliceBlue</td>
    <td align="left">rgb(240, 248, 255)</td>
    <td align="left">#F0F8FF</td>
  </tr>

  <tr>
    <td align="right">SteelBlue4</td>
    <td align="center" style="background-color: rgb( 54, 100, 139)">SteelBlue4</td>
    <td align="left">rgb( 54, 100, 139)</td>
    <td align="left">#36648B</td>
  </tr>

  <tr>
    <td align="right">SteelBlue</td>
    <td align="center" style="background-color: rgb( 70, 130, 180)">SteelBlue</td>
    <td align="left">rgb( 70, 130, 180)</td>
    <td align="left">#4682B4</td>
  </tr>

  <tr>
    <td align="right">SteelBlue1</td>
    <td align="center" style="background-color: rgb( 99, 184, 255)">SteelBlue1</td>
    <td align="left">rgb( 99, 184, 255)</td>
    <td align="left">#63B8FF</td>
  </tr>

  <tr>
    <td align="right">SteelBlue2</td>
    <td align="center" style="background-color: rgb( 92, 172, 238)">SteelBlue2</td>
    <td align="left">rgb( 92, 172, 238)</td>
    <td align="left">#5CACEE</td>
  </tr>

  <tr>
    <td align="right">SteelBlue3</td>
    <td align="center" style="background-color: rgb( 79, 148, 205)">SteelBlue3</td>
    <td align="left">rgb( 79, 148, 205)</td>
    <td align="left">#4F94CD</td>
  </tr>

  <tr>
    <td align="right">SkyBlue4</td>
    <td align="center" style="background-color: rgb( 74, 112, 139)">SkyBlue4</td>
    <td align="left">rgb( 74, 112, 139)</td>
    <td align="left">#4A708B</td>
  </tr>

  <tr>
    <td align="right">SkyBlue1</td>
    <td align="center" style="background-color: rgb(135, 206, 255)">SkyBlue1</td>
    <td align="left">rgb(135, 206, 255)</td>
    <td align="left">#87CEFF</td>
  </tr>

  <tr>
    <td align="right">SkyBlue2</td>
    <td align="center" style="background-color: rgb(126, 192, 238)">SkyBlue2</td>
    <td align="left">rgb(126, 192, 238)</td>
    <td align="left">#7EC0EE</td>
  </tr>

  <tr>
    <td align="right">SkyBlue3</td>
    <td align="center" style="background-color: rgb(108, 166, 205)">SkyBlue3</td>
    <td align="left">rgb(108, 166, 205)</td>
    <td align="left">#6CA6CD</td>
  </tr>

  <tr>
    <td align="right">LightSkyBlue</td>
    <td align="center" style="background-color: rgb(135, 206, 250)">LightSkyBlue</td>
    <td align="left">rgb(135, 206, 250)</td>
    <td align="left">#87CEFA</td>
  </tr>

  <tr>
    <td align="right">LightSkyBlue4</td>
    <td align="center" style="background-color: rgb( 96, 123, 139)">LightSkyBlue4</td>
    <td align="left">rgb( 96, 123, 139)</td>
    <td align="left">#607B8B</td>
  </tr>

  <tr>
    <td align="right">LightSkyBlue1</td>
    <td align="center" style="background-color: rgb(176, 226, 255)">LightSkyBlue1</td>
    <td align="left">rgb(176, 226, 255)</td>
    <td align="left">#B0E2FF</td>
  </tr>

  <tr>
    <td align="right">LightSkyBlue2</td>
    <td align="center" style="background-color: rgb(164, 211, 238)">LightSkyBlue2</td>
    <td align="left">rgb(164, 211, 238)</td>
    <td align="left">#A4D3EE</td>
  </tr>

  <tr>
    <td align="right">LightSkyBlue3</td>
    <td align="center" style="background-color: rgb(141, 182, 205)">LightSkyBlue3</td>
    <td align="left">rgb(141, 182, 205)</td>
    <td align="left">#8DB6CD</td>
  </tr>

  <tr>
    <td align="right">SkyBlue</td>
    <td align="center" style="background-color: rgb(135, 206, 235)">SkyBlue</td>
    <td align="left">rgb(135, 206, 235)</td>
    <td align="left">#87CEEB</td>
  </tr>

  <tr>
    <td align="right">LightBlue3</td>
    <td align="center" style="background-color: rgb(154, 192, 205)">LightBlue3</td>
    <td align="left">rgb(154, 192, 205)</td>
    <td align="left">#9AC0CD</td>
  </tr>

  <tr>
    <td align="right">DeepSkyBlue</td>
    <td align="center" style="background-color: rgb(  0, 191, 255)">DeepSkyBlue</td>
    <td align="left">rgb(  0, 191, 255)</td>
    <td align="left">#00BFFF</td>
  </tr>

  <tr>
    <td align="right">DeepSkyBlue1</td>
    <td align="center" style="background-color: rgb(  0, 191, 255)">DeepSkyBlue1</td>
    <td align="left">rgb(  0, 191, 255)</td>
    <td align="left">#00BFFF</td>
  </tr>

  <tr>
    <td align="right">DeepSkyBlue2</td>
    <td align="center" style="background-color: rgb(  0, 178, 238)">DeepSkyBlue2</td>
    <td align="left">rgb(  0, 178, 238)</td>
    <td align="left">#00B2EE</td>
  </tr>

  <tr>
    <td align="right">DeepSkyBlue4</td>
    <td align="center" style="background-color: rgb(  0, 104, 139)">DeepSkyBlue4</td>
    <td align="left">rgb(  0, 104, 139)</td>
    <td align="left">#00688B</td>
  </tr>

  <tr>
    <td align="right">DeepSkyBlue3</td>
    <td align="center" style="background-color: rgb(  0, 154, 205)">DeepSkyBlue3</td>
    <td align="left">rgb(  0, 154, 205)</td>
    <td align="left">#009ACD</td>
  </tr>

  <tr>
    <td align="right">LightBlue1</td>
    <td align="center" style="background-color: rgb(191, 239, 255)">LightBlue1</td>
    <td align="left">rgb(191, 239, 255)</td>
    <td align="left">#BFEFFF</td>
  </tr>

  <tr>
    <td align="right">LightBlue2</td>
    <td align="center" style="background-color: rgb(178, 223, 238)">LightBlue2</td>
    <td align="left">rgb(178, 223, 238)</td>
    <td align="left">#B2DFEE</td>
  </tr>

  <tr>
    <td align="right">LightBlue</td>
    <td align="center" style="background-color: rgb(173, 216, 230)">LightBlue</td>
    <td align="left">rgb(173, 216, 230)</td>
    <td align="left">#ADD8E6</td>
  </tr>

  <tr>
    <td align="right">LightBlue4</td>
    <td align="center" style="background-color: rgb(104, 131, 139)">LightBlue4</td>
    <td align="left">rgb(104, 131, 139)</td>
    <td align="left">#68838B</td>
  </tr>

  <tr>
    <td align="right">PowderBlue</td>
    <td align="center" style="background-color: rgb(176, 224, 230)">PowderBlue</td>
    <td align="left">rgb(176, 224, 230)</td>
    <td align="left">#B0E0E6</td>
  </tr>

  <tr>
    <td align="right">CadetBlue1</td>
    <td align="center" style="background-color: rgb(152, 245, 255)">CadetBlue1</td>
    <td align="left">rgb(152, 245, 255)</td>
    <td align="left">#98F5FF</td>
  </tr>

  <tr>
    <td align="right">CadetBlue2</td>
    <td align="center" style="background-color: rgb(142, 229, 238)">CadetBlue2</td>
    <td align="left">rgb(142, 229, 238)</td>
    <td align="left">#8EE5EE</td>
  </tr>

  <tr>
    <td align="right">CadetBlue3</td>
    <td align="center" style="background-color: rgb(122, 197, 205)">CadetBlue3</td>
    <td align="left">rgb(122, 197, 205)</td>
    <td align="left">#7AC5CD</td>
  </tr>

  <tr>
    <td align="right">CadetBlue4</td>
    <td align="center" style="background-color: rgb( 83, 134, 139)">CadetBlue4</td>
    <td align="left">rgb( 83, 134, 139)</td>
    <td align="left">#53868B</td>
  </tr>

  <tr>
    <td align="right">turquoise1</td>
    <td align="center" style="background-color: rgb(  0, 245, 255)">turquoise1</td>
    <td align="left">rgb(  0, 245, 255)</td>
    <td align="left">#00F5FF</td>
  </tr>

  <tr>
    <td align="right">turquoise2</td>
    <td align="center" style="background-color: rgb(  0, 229, 238)">turquoise2</td>
    <td align="left">rgb(  0, 229, 238)</td>
    <td align="left">#00E5EE</td>
  </tr>

  <tr>
    <td align="right">turquoise3</td>
    <td align="center" style="background-color: rgb(  0, 197, 205)">turquoise3</td>
    <td align="left">rgb(  0, 197, 205)</td>
    <td align="left">#00C5CD</td>
  </tr>

  <tr>
    <td align="right">turquoise4</td>
    <td align="center" style="background-color: rgb(  0, 134, 139)">turquoise4</td>
    <td align="left">rgb(  0, 134, 139)</td>
    <td align="left">#00868B</td>
  </tr>

  <tr>
    <td align="right">cadet blue</td>
    <td align="center" style="background-color: rgb( 95, 158, 160)">cadet blue</td>
    <td align="left">rgb( 95, 158, 160)</td>
    <td align="left">#5F9EA0</td>
  </tr>

  <tr>
    <td align="right">CadetBlue</td>
    <td align="center" style="background-color: rgb( 95, 158, 160)">CadetBlue</td>
    <td align="left">rgb( 95, 158, 160)</td>
    <td align="left">#5F9EA0</td>
  </tr>

  <tr>
    <td align="right">DarkTurquoise</td>
    <td align="center" style="background-color: rgb(  0, 206, 209)">DarkTurquoise</td>
    <td align="left">rgb(  0, 206, 209)</td>
    <td align="left">#00CED1</td>
  </tr>

  <tr>
    <td align="right">azure</td>
    <td align="center" style="background-color: rgb(240, 255, 255)">azure</td>
    <td align="left">rgb(240, 255, 255)</td>
    <td align="left">#F0FFFF</td>
  </tr>

  <tr>
    <td align="right">azure1</td>
    <td align="center" style="background-color: rgb(240, 255, 255)">azure1</td>
    <td align="left">rgb(240, 255, 255)</td>
    <td align="left">#F0FFFF</td>
  </tr>

  <tr>
    <td align="right">LightCyan</td>
    <td align="center" style="background-color: rgb(224, 255, 255)">LightCyan</td>
    <td align="left">rgb(224, 255, 255)</td>
    <td align="left">#E0FFFF</td>
  </tr>

  <tr>
    <td align="right">LightCyan1</td>
    <td align="center" style="background-color: rgb(224, 255, 255)">LightCyan1</td>
    <td align="left">rgb(224, 255, 255)</td>
    <td align="left">#E0FFFF</td>
  </tr>

  <tr>
    <td align="right">azure2</td>
    <td align="center" style="background-color: rgb(224, 238, 238)">azure2</td>
    <td align="left">rgb(224, 238, 238)</td>
    <td align="left">#E0EEEE</td>
  </tr>

  <tr>
    <td align="right">LightCyan2</td>
    <td align="center" style="background-color: rgb(209, 238, 238)">LightCyan2</td>
    <td align="left">rgb(209, 238, 238)</td>
    <td align="left">#D1EEEE</td>
  </tr>

  <tr>
    <td align="right">PaleTurquoise1</td>
    <td align="center" style="background-color: rgb(187, 255, 255)">PaleTurquoise1</td>
    <td align="left">rgb(187, 255, 255)</td>
    <td align="left">#BBFFFF</td>
  </tr>

  <tr>
    <td align="right">PaleTurquoise</td>
    <td align="center" style="background-color: rgb(175, 238, 238)">PaleTurquoise</td>
    <td align="left">rgb(175, 238, 238)</td>
    <td align="left">#AFEEEE</td>
  </tr>

  <tr>
    <td align="right">PaleTurquoise2</td>
    <td align="center" style="background-color: rgb(174, 238, 238)">PaleTurquoise2</td>
    <td align="left">rgb(174, 238, 238)</td>
    <td align="left">#AEEEEE</td>
  </tr>

  <tr>
    <td align="right">DarkSlateGray1</td>
    <td align="center" style="background-color: rgb(151, 255, 255)">DarkSlateGray1</td>
    <td align="left">rgb(151, 255, 255)</td>
    <td align="left">#97FFFF</td>
  </tr>

  <tr>
    <td align="right">azure3</td>
    <td align="center" style="background-color: rgb(193, 205, 205)">azure3</td>
    <td align="left">rgb(193, 205, 205)</td>
    <td align="left">#C1CDCD</td>
  </tr>

  <tr>
    <td align="right">LightCyan3</td>
    <td align="center" style="background-color: rgb(180, 205, 205)">LightCyan3</td>
    <td align="left">rgb(180, 205, 205)</td>
    <td align="left">#B4CDCD</td>
  </tr>

  <tr>
    <td align="right">DarkSlateGray2</td>
    <td align="center" style="background-color: rgb(141, 238, 238)">DarkSlateGray2</td>
    <td align="left">rgb(141, 238, 238)</td>
    <td align="left">#8DEEEE</td>
  </tr>

  <tr>
    <td align="right">PaleTurquoise3</td>
    <td align="center" style="background-color: rgb(150, 205, 205)">PaleTurquoise3</td>
    <td align="left">rgb(150, 205, 205)</td>
    <td align="left">#96CDCD</td>
  </tr>

  <tr>
    <td align="right">DarkSlateGray3</td>
    <td align="center" style="background-color: rgb(121, 205, 205)">DarkSlateGray3</td>
    <td align="left">rgb(121, 205, 205)</td>
    <td align="left">#79CDCD</td>
  </tr>

  <tr>
    <td align="right">azure4</td>
    <td align="center" style="background-color: rgb(131, 139, 139)">azure4</td>
    <td align="left">rgb(131, 139, 139)</td>
    <td align="left">#838B8B</td>
  </tr>

  <tr>
    <td align="right">LightCyan4</td>
    <td align="center" style="background-color: rgb(122, 139, 139)">LightCyan4</td>
    <td align="left">rgb(122, 139, 139)</td>
    <td align="left">#7A8B8B</td>
  </tr>

  <tr>
    <td align="right">aqua</td>
    <td align="center" style="background-color: rgb(  0, 255, 255)">aqua</td>
    <td align="left">rgb(  0, 255, 255)</td>
    <td align="left">#00FFFF</td>
  </tr>

  <tr>
    <td align="right">cyan</td>
    <td align="center" style="background-color: rgb(  0, 255, 255)">cyan</td>
    <td align="left">rgb(  0, 255, 255)</td>
    <td align="left">#00FFFF</td>
  </tr>

  <tr>
    <td align="right">cyan1</td>
    <td align="center" style="background-color: rgb(  0, 255, 255)">cyan1</td>
    <td align="left">rgb(  0, 255, 255)</td>
    <td align="left">#00FFFF</td>
  </tr>

  <tr>
    <td align="right">PaleTurquoise4</td>
    <td align="center" style="background-color: rgb(102, 139, 139)">PaleTurquoise4</td>
    <td align="left">rgb(102, 139, 139)</td>
    <td align="left">#668B8B</td>
  </tr>

  <tr>
    <td align="right">cyan2</td>
    <td align="center" style="background-color: rgb(  0, 238, 238)">cyan2</td>
    <td align="left">rgb(  0, 238, 238)</td>
    <td align="left">#00EEEE</td>
  </tr>

  <tr>
    <td align="right">DarkSlateGray4</td>
    <td align="center" style="background-color: rgb( 82, 139, 139)">DarkSlateGray4</td>
    <td align="left">rgb( 82, 139, 139)</td>
    <td align="left">#528B8B</td>
  </tr>

  <tr>
    <td align="right">cyan3</td>
    <td align="center" style="background-color: rgb(  0, 205, 205)">cyan3</td>
    <td align="left">rgb(  0, 205, 205)</td>
    <td align="left">#00CDCD</td>
  </tr>

  <tr>
    <td align="right">cyan4</td>
    <td align="center" style="background-color: rgb(  0, 139, 139)">cyan4</td>
    <td align="left">rgb(  0, 139, 139)</td>
    <td align="left">#008B8B</td>
  </tr>

  <tr>
    <td align="right">DarkCyan</td>
    <td align="center" style="background-color: rgb(  0, 139, 139)">DarkCyan</td>
    <td align="left">rgb(  0, 139, 139)</td>
    <td align="left">#008B8B</td>
  </tr>

  <tr>
    <td align="right">teal</td>
    <td align="center" style="background-color: rgb(  0, 128, 128)">teal</td>
    <td align="left">rgb(  0, 128, 128)</td>
    <td align="left">#008080</td>
  </tr>

  <tr>
    <td align="right">DarkSlateGray</td>
    <td align="center" style="background-color: rgb( 47, 79,  79)">DarkSlateGray</td>
    <td align="left">rgb( 47, 79,  79)</td>
    <td align="left">#2F4F4F</td>
  </tr>

  <tr>
    <td align="right">DarkSlateGrey</td>
    <td align="center" style="background-color: rgb( 47, 79,  79)">DarkSlateGrey</td>
    <td align="left">rgb( 47, 79,  79)</td>
    <td align="left">#2F4F4F</td>
  </tr>

  <tr>
    <td align="right">MediumTurquoise</td>
    <td align="center" style="background-color: rgb( 72, 209, 204)">MediumTurquoise</td>
    <td align="left">rgb( 72, 209, 204)</td>
    <td align="left">#48D1CC</td>
  </tr>

  <tr>
    <td align="right">LightSeaGreen</td>
    <td align="center" style="background-color: rgb( 32, 178, 170)">LightSeaGreen</td>
    <td align="left">rgb( 32, 178, 170)</td>
    <td align="left">#20B2AA</td>
  </tr>

  <tr>
    <td align="right">turquoise</td>
    <td align="center" style="background-color: rgb( 64, 224, 208)">turquoise</td>
    <td align="left">rgb( 64, 224, 208)</td>
    <td align="left">#40E0D0</td>
  </tr>

  <tr>
    <td align="right">aquamarine4</td>
    <td align="center" style="background-color: rgb( 69, 139, 116)">aquamarine4</td>
    <td align="left">rgb( 69, 139, 116)</td>
    <td align="left">#458B74</td>
  </tr>

  <tr>
    <td align="right">aquamarine</td>
    <td align="center" style="background-color: rgb(127, 255, 212)">aquamarine</td>
    <td align="left">rgb(127, 255, 212)</td>
    <td align="left">#7FFFD4</td>
  </tr>

  <tr>
    <td align="right">aquamarine1</td>
    <td align="center" style="background-color: rgb(127, 255, 212)">aquamarine1</td>
    <td align="left">rgb(127, 255, 212)</td>
    <td align="left">#7FFFD4</td>
  </tr>

  <tr>
    <td align="right">aquamarine2</td>
    <td align="center" style="background-color: rgb(118, 238, 198)">aquamarine2</td>
    <td align="left">rgb(118, 238, 198)</td>
    <td align="left">#76EEC6</td>
  </tr>

  <tr>
    <td align="right">aquamarine3</td>
    <td align="center" style="background-color: rgb(102, 205, 170)">aquamarine3</td>
    <td align="left">rgb(102, 205, 170)</td>
    <td align="left">#66CDAA</td>
  </tr>

  <tr>
    <td align="right">MediumAquamarine</td>
    <td align="center" style="background-color: rgb(102, 205, 170)">MediumAquamarine</td>
    <td align="left">rgb(102, 205, 170)</td>
    <td align="left">#66CDAA</td>
  </tr>

  <tr>
    <td align="right">MediumSpringGreen</td>
    <td align="center" style="background-color: rgb(  0, 250, 154)">MediumSpringGreen</td>
    <td align="left">rgb(  0, 250, 154)</td>
    <td align="left">#00FA9A</td>
  </tr>

  <tr>
    <td align="right">MintCream</td>
    <td align="center" style="background-color: rgb(245, 255, 250)">MintCream</td>
    <td align="left">rgb(245, 255, 250)</td>
    <td align="left">#F5FFFA</td>
  </tr>

  <tr>
    <td align="right">SpringGreen</td>
    <td align="center" style="background-color: rgb(  0, 255, 127)">SpringGreen</td>
    <td align="left">rgb(  0, 255, 127)</td>
    <td align="left">#00FF7F</td>
  </tr>

  <tr>
    <td align="right">SpringGreen1</td>
    <td align="center" style="background-color: rgb(  0, 255, 127)">SpringGreen1</td>
    <td align="left">rgb(  0, 255, 127)</td>
    <td align="left">#00FF7F</td>
  </tr>

  <tr>
    <td align="right">SpringGreen2</td>
    <td align="center" style="background-color: rgb(  0, 238, 118)">SpringGreen2</td>
    <td align="left">rgb(  0, 238, 118)</td>
    <td align="left">#00EE76</td>
  </tr>

  <tr>
    <td align="right">SpringGreen3</td>
    <td align="center" style="background-color: rgb(  0, 205, 102)">SpringGreen3</td>
    <td align="left">rgb(  0, 205, 102)</td>
    <td align="left">#00CD66</td>
  </tr>

  <tr>
    <td align="right">SpringGreen4</td>
    <td align="center" style="background-color: rgb(  0, 139, 69)">SpringGreen4</td>
    <td align="left">rgb(  0, 139, 69)</td>
    <td align="left">#008B45</td>
  </tr>

  <tr>
    <td align="right">MediumSeaGreen</td>
    <td align="center" style="background-color: rgb( 60, 179, 113)">MediumSeaGreen</td>
    <td align="left">rgb( 60, 179, 113)</td>
    <td align="left">#3CB371</td>
  </tr>

  <tr>
    <td align="right">SeaGreen</td>
    <td align="center" style="background-color: rgb( 46, 139, 87)">SeaGreen</td>
    <td align="left">rgb( 46, 139, 87)</td>
    <td align="left">#2E8B57</td>
  </tr>

  <tr>
    <td align="right">SeaGreen3</td>
    <td align="center" style="background-color: rgb( 67, 205, 128)">SeaGreen3</td>
    <td align="left">rgb( 67, 205, 128)</td>
    <td align="left">#43CD80</td>
  </tr>

  <tr>
    <td align="right">SeaGreen1</td>
    <td align="center" style="background-color: rgb( 84, 255, 159)">SeaGreen1</td>
    <td align="left">rgb( 84, 255, 159)</td>
    <td align="left">#54FF9F</td>
  </tr>

  <tr>
    <td align="right">SeaGreen4</td>
    <td align="center" style="background-color: rgb( 46, 139, 87)">SeaGreen4</td>
    <td align="left">rgb( 46, 139, 87)</td>
    <td align="left">#2E8B57</td>
  </tr>

  <tr>
    <td align="right">SeaGreen2</td>
    <td align="center" style="background-color: rgb( 78, 238, 148)">SeaGreen2</td>
    <td align="left">rgb( 78, 238, 148)</td>
    <td align="left">#4EEE94</td>
  </tr>

  <tr>
    <td align="right">MediumForestGreen</td>
    <td align="center" style="background-color: rgb( 50, 129, 75)">MediumForestGreen</td>
    <td align="left">rgb( 50, 129, 75)</td>
    <td align="left">#32814B</td>
  </tr>

  <tr>
    <td align="right">honeydew</td>
    <td align="center" style="background-color: rgb(240, 255, 240)">honeydew</td>
    <td align="left">rgb(240, 255, 240)</td>
    <td align="left">#F0FFF0</td>
  </tr>

  <tr>
    <td align="right">honeydew1</td>
    <td align="center" style="background-color: rgb(240, 255, 240)">honeydew1</td>
    <td align="left">rgb(240, 255, 240)</td>
    <td align="left">#F0FFF0</td>
  </tr>

  <tr>
    <td align="right">honeydew2</td>
    <td align="center" style="background-color: rgb(224, 238, 224)">honeydew2</td>
    <td align="left">rgb(224, 238, 224)</td>
    <td align="left">#E0EEE0</td>
  </tr>

  <tr>
    <td align="right">DarkSeaGreen1</td>
    <td align="center" style="background-color: rgb(193, 255, 193)">DarkSeaGreen1</td>
    <td align="left">rgb(193, 255, 193)</td>
    <td align="left">#C1FFC1</td>
  </tr>

  <tr>
    <td align="right">DarkSeaGreen2</td>
    <td align="center" style="background-color: rgb(180, 238, 180)">DarkSeaGreen2</td>
    <td align="left">rgb(180, 238, 180)</td>
    <td align="left">#B4EEB4</td>
  </tr>

  <tr>
    <td align="right">PaleGreen1</td>
    <td align="center" style="background-color: rgb(154, 255, 154)">PaleGreen1</td>
    <td align="left">rgb(154, 255, 154)</td>
    <td align="left">#9AFF9A</td>
  </tr>

  <tr>
    <td align="right">PaleGreen</td>
    <td align="center" style="background-color: rgb(152, 251, 152)">PaleGreen</td>
    <td align="left">rgb(152, 251, 152)</td>
    <td align="left">#98FB98</td>
  </tr>

  <tr>
    <td align="right">honeydew3</td>
    <td align="center" style="background-color: rgb(193, 205, 193)">honeydew3</td>
    <td align="left">rgb(193, 205, 193)</td>
    <td align="left">#C1CDC1</td>
  </tr>

  <tr>
    <td align="right">LightGreen</td>
    <td align="center" style="background-color: rgb(144, 238, 144)">LightGreen</td>
    <td align="left">rgb(144, 238, 144)</td>
    <td align="left">#90EE90</td>
  </tr>

  <tr>
    <td align="right">PaleGreen2</td>
    <td align="center" style="background-color: rgb(144, 238, 144)">PaleGreen2</td>
    <td align="left">rgb(144, 238, 144)</td>
    <td align="left">#90EE90</td>
  </tr>

  <tr>
    <td align="right">DarkSeaGreen3</td>
    <td align="center" style="background-color: rgb(155, 205, 155)">DarkSeaGreen3</td>
    <td align="left">rgb(155, 205, 155)</td>
    <td align="left">#9BCD9B</td>
  </tr>

  <tr>
    <td align="right">DarkSeaGreen</td>
    <td align="center" style="background-color: rgb(143, 188, 143)">DarkSeaGreen</td>
    <td align="left">rgb(143, 188, 143)</td>
    <td align="left">#8FBC8F</td>
  </tr>

  <tr>
    <td align="right">PaleGreen3</td>
    <td align="center" style="background-color: rgb(124, 205, 124)">PaleGreen3</td>
    <td align="left">rgb(124, 205, 124)</td>
    <td align="left">#7CCD7C</td>
  </tr>

  <tr>
    <td align="right">honeydew4</td>
    <td align="center" style="background-color: rgb(131, 139, 131)">honeydew4</td>
    <td align="left">rgb(131, 139, 131)</td>
    <td align="left">#838B83</td>
  </tr>

  <tr>
    <td align="right">green1</td>
    <td align="center" style="background-color: rgb(  0, 255,  0)">green1</td>
    <td align="left">rgb(  0, 255,  0)</td>
    <td align="left">#00FF00</td>
  </tr>

  <tr>
    <td align="right">lime</td>
    <td align="center" style="background-color: rgb(  0, 255,  0)">lime</td>
    <td align="left">rgb(  0, 255,  0)</td>
    <td align="left">#00FF00</td>
  </tr>

  <tr>
    <td align="right">LimeGreen</td>
    <td align="center" style="background-color: rgb( 50, 205, 50)">LimeGreen</td>
    <td align="left">rgb( 50, 205, 50)</td>
    <td align="left">#32CD32</td>
  </tr>

  <tr>
    <td align="right">DarkSeaGreen4</td>
    <td align="center" style="background-color: rgb(105, 139, 105)">DarkSeaGreen4</td>
    <td align="left">rgb(105, 139, 105)</td>
    <td align="left">#698B69</td>
  </tr>

  <tr>
    <td align="right">green2</td>
    <td align="center" style="background-color: rgb(  0, 238,  0)">green2</td>
    <td align="left">rgb(  0, 238,  0)</td>
    <td align="left">#00EE00</td>
  </tr>

  <tr>
    <td align="right">PaleGreen4</td>
    <td align="center" style="background-color: rgb( 84, 139, 84)">PaleGreen4</td>
    <td align="left">rgb( 84, 139, 84)</td>
    <td align="left">#548B54</td>
  </tr>

  <tr>
    <td align="right">green3</td>
    <td align="center" style="background-color: rgb(  0, 205,  0)">green3</td>
    <td align="left">rgb(  0, 205,  0)</td>
    <td align="left">#00CD00</td>
  </tr>

  <tr>
    <td align="right">ForestGreen</td>
    <td align="center" style="background-color: rgb( 34, 139, 34)">ForestGreen</td>
    <td align="left">rgb( 34, 139, 34)</td>
    <td align="left">#228B22</td>
  </tr>

  <tr>
    <td align="right">green4</td>
    <td align="center" style="background-color: rgb(  0, 139,  0)">green4</td>
    <td align="left">rgb(  0, 139,  0)</td>
    <td align="left">#008B00</td>
  </tr>

  <tr>
    <td align="right">green</td>
    <td align="center" style="background-color: rgb(  0, 128,  0)">green</td>
    <td align="left">rgb(  0, 128,  0)</td>
    <td align="left">#008000</td>
  </tr>

  <tr>
    <td align="right">DarkGreen</td>
    <td align="center" style="background-color: rgb(  0, 100,  0)">DarkGreen</td>
    <td align="left">rgb(  0, 100,  0)</td>
    <td align="left">#006400</td>
  </tr>

  <tr>
    <td align="right">LawnGreen</td>
    <td align="center" style="background-color: rgb(124, 252,  0)">LawnGreen</td>
    <td align="left">rgb(124, 252,  0)</td>
    <td align="left">#7CFC00</td>
  </tr>

  <tr>
    <td align="right">chartreuse</td>
    <td align="center" style="background-color: rgb(127, 255,  0)">chartreuse</td>
    <td align="left">rgb(127, 255,  0)</td>
    <td align="left">#7FFF00</td>
  </tr>

  <tr>
    <td align="right">chartreuse1</td>
    <td align="center" style="background-color: rgb(127, 255,  0)">chartreuse1</td>
    <td align="left">rgb(127, 255,  0)</td>
    <td align="left">#7FFF00</td>
  </tr>

  <tr>
    <td align="right">chartreuse2</td>
    <td align="center" style="background-color: rgb(118, 238,  0)">chartreuse2</td>
    <td align="left">rgb(118, 238,  0)</td>
    <td align="left">#76EE00</td>
  </tr>

  <tr>
    <td align="right">chartreuse3</td>
    <td align="center" style="background-color: rgb(102, 205,  0)">chartreuse3</td>
    <td align="left">rgb(102, 205,  0)</td>
    <td align="left">#66CD00</td>
  </tr>

  <tr>
    <td align="right">chartreuse4</td>
    <td align="center" style="background-color: rgb( 69, 139,  0)">chartreuse4</td>
    <td align="left">rgb( 69, 139,  0)</td>
    <td align="left">#458B00</td>
  </tr>

  <tr>
    <td align="right">GreenYellow</td>
    <td align="center" style="background-color: rgb(173, 255, 47)">GreenYellow</td>
    <td align="left">rgb(173, 255, 47)</td>
    <td align="left">#ADFF2F</td>
  </tr>

  <tr>
    <td align="right">DarkOliveGreen3</td>
    <td align="center" style="background-color: rgb(162, 205, 90)">DarkOliveGreen3</td>
    <td align="left">rgb(162, 205, 90)</td>
    <td align="left">#A2CD5A</td>
  </tr>

  <tr>
    <td align="right">DarkOliveGreen1</td>
    <td align="center" style="background-color: rgb(202, 255, 112)">DarkOliveGreen1</td>
    <td align="left">rgb(202, 255, 112)</td>
    <td align="left">#CAFF70</td>
  </tr>

  <tr>
    <td align="right">DarkOliveGreen2</td>
    <td align="center" style="background-color: rgb(188, 238, 104)">DarkOliveGreen2</td>
    <td align="left">rgb(188, 238, 104)</td>
    <td align="left">#BCEE68</td>
  </tr>

  <tr>
    <td align="right">DarkOliveGreen4</td>
    <td align="center" style="background-color: rgb(110, 139, 61)">DarkOliveGreen4</td>
    <td align="left">rgb(110, 139, 61)</td>
    <td align="left">#6E8B3D</td>
  </tr>

  <tr>
    <td align="right">DarkOliveGreen</td>
    <td align="center" style="background-color: rgb( 85, 107, 47)">DarkOliveGreen</td>
    <td align="left">rgb( 85, 107, 47)</td>
    <td align="left">#556B2F</td>
  </tr>

  <tr>
    <td align="right">OliveDrab</td>
    <td align="center" style="background-color: rgb(107, 142, 35)">OliveDrab</td>
    <td align="left">rgb(107, 142, 35)</td>
    <td align="left">#6B8E23</td>
  </tr>

  <tr>
    <td align="right">OliveDrab1</td>
    <td align="center" style="background-color: rgb(192, 255, 62)">OliveDrab1</td>
    <td align="left">rgb(192, 255, 62)</td>
    <td align="left">#C0FF3E</td>
  </tr>

  <tr>
    <td align="right">OliveDrab2</td>
    <td align="center" style="background-color: rgb(179, 238, 58)">OliveDrab2</td>
    <td align="left">rgb(179, 238, 58)</td>
    <td align="left">#B3EE3A</td>
  </tr>

  <tr>
    <td align="right">OliveDrab3</td>
    <td align="center" style="background-color: rgb(154, 205, 50)">OliveDrab3</td>
    <td align="left">rgb(154, 205, 50)</td>
    <td align="left">#9ACD32</td>
  </tr>

  <tr>
    <td align="right">YellowGreen</td>
    <td align="center" style="background-color: rgb(154, 205, 50)">YellowGreen</td>
    <td align="left">rgb(154, 205, 50)</td>
    <td align="left">#9ACD32</td>
  </tr>

  <tr>
    <td align="right">OliveDrab4</td>
    <td align="center" style="background-color: rgb(105, 139, 34)">OliveDrab4</td>
    <td align="left">rgb(105, 139, 34)</td>
    <td align="left">#698B22</td>
  </tr>

  <tr>
    <td align="right">ivory</td>
    <td align="center" style="background-color: rgb(255, 255, 240)">ivory</td>
    <td align="left">rgb(255, 255, 240)</td>
    <td align="left">#FFFFF0</td>
  </tr>

  <tr>
    <td align="right">ivory1</td>
    <td align="center" style="background-color: rgb(255, 255, 240)">ivory1</td>
    <td align="left">rgb(255, 255, 240)</td>
    <td align="left">#FFFFF0</td>
  </tr>

  <tr>
    <td align="right">LightYellow</td>
    <td align="center" style="background-color: rgb(255, 255, 224)">LightYellow</td>
    <td align="left">rgb(255, 255, 224)</td>
    <td align="left">#FFFFE0</td>
  </tr>

  <tr>
    <td align="right">LightYellow1</td>
    <td align="center" style="background-color: rgb(255, 255, 224)">LightYellow1</td>
    <td align="left">rgb(255, 255, 224)</td>
    <td align="left">#FFFFE0</td>
  </tr>

  <tr>
    <td align="right">beige</td>
    <td align="center" style="background-color: rgb(245, 245, 220)">beige</td>
    <td align="left">rgb(245, 245, 220)</td>
    <td align="left">#F5F5DC</td>
  </tr>

  <tr>
    <td align="right">ivory2</td>
    <td align="center" style="background-color: rgb(238, 238, 224)">ivory2</td>
    <td align="left">rgb(238, 238, 224)</td>
    <td align="left">#EEEEE0</td>
  </tr>

  <tr>
    <td align="right">LightGoldenrodYellow</td>
    <td align="center" style="background-color: rgb(250, 250, 210)">LightGoldenrodYellow</td>
    <td align="left">rgb(250, 250, 210)</td>
    <td align="left">#FAFAD2</td>
  </tr>

  <tr>
    <td align="right">LightYellow2</td>
    <td align="center" style="background-color: rgb(238, 238, 209)">LightYellow2</td>
    <td align="left">rgb(238, 238, 209)</td>
    <td align="left">#EEEED1</td>
  </tr>

  <tr>
    <td align="right">ivory3</td>
    <td align="center" style="background-color: rgb(205, 205, 193)">ivory3</td>
    <td align="left">rgb(205, 205, 193)</td>
    <td align="left">#CDCDC1</td>
  </tr>

  <tr>
    <td align="right">LightYellow3</td>
    <td align="center" style="background-color: rgb(205, 205, 180)">LightYellow3</td>
    <td align="left">rgb(205, 205, 180)</td>
    <td align="left">#CDCDB4</td>
  </tr>

  <tr>
    <td align="right">ivory4</td>
    <td align="center" style="background-color: rgb(139, 139, 131)">ivory4</td>
    <td align="left">rgb(139, 139, 131)</td>
    <td align="left">#8B8B83</td>
  </tr>

  <tr>
    <td align="right">LightYellow4</td>
    <td align="center" style="background-color: rgb(139, 139, 122)">LightYellow4</td>
    <td align="left">rgb(139, 139, 122)</td>
    <td align="left">#8B8B7A</td>
  </tr>

  <tr>
    <td align="right">yellow</td>
    <td align="center" style="background-color: rgb(255, 255,  0)">yellow</td>
    <td align="left">rgb(255, 255,  0)</td>
    <td align="left">#FFFF00</td>
  </tr>

  <tr>
    <td align="right">yellow1</td>
    <td align="center" style="background-color: rgb(255, 255,  0)">yellow1</td>
    <td align="left">rgb(255, 255,  0)</td>
    <td align="left">#FFFF00</td>
  </tr>

  <tr>
    <td align="right">yellow2</td>
    <td align="center" style="background-color: rgb(238, 238,  0)">yellow2</td>
    <td align="left">rgb(238, 238,  0)</td>
    <td align="left">#EEEE00</td>
  </tr>

  <tr>
    <td align="right">yellow3</td>
    <td align="center" style="background-color: rgb(205, 205,  0)">yellow3</td>
    <td align="left">rgb(205, 205,  0)</td>
    <td align="left">#CDCD00</td>
  </tr>

  <tr>
    <td align="right">yellow4</td>
    <td align="center" style="background-color: rgb(139, 139,  0)">yellow4</td>
    <td align="left">rgb(139, 139,  0)</td>
    <td align="left">#8B8B00</td>
  </tr>

  <tr>
    <td align="right">olive</td>
    <td align="center" style="background-color: rgb(128, 128,  0)">olive</td>
    <td align="left">rgb(128, 128,  0)</td>
    <td align="left">#808000</td>
  </tr>

  <tr>
    <td align="right">DarkKhaki</td>
    <td align="center" style="background-color: rgb(189, 183, 107)">DarkKhaki</td>
    <td align="left">rgb(189, 183, 107)</td>
    <td align="left">#BDB76B</td>
  </tr>

  <tr>
    <td align="right">khaki2</td>
    <td align="center" style="background-color: rgb(238, 230, 133)">khaki2</td>
    <td align="left">rgb(238, 230, 133)</td>
    <td align="left">#EEE685</td>
  </tr>

  <tr>
    <td align="right">LemonChiffon4</td>
    <td align="center" style="background-color: rgb(139, 137, 112)">LemonChiffon4</td>
    <td align="left">rgb(139, 137, 112)</td>
    <td align="left">#8B8970</td>
  </tr>

  <tr>
    <td align="right">khaki1</td>
    <td align="center" style="background-color: rgb(255, 246, 143)">khaki1</td>
    <td align="left">rgb(255, 246, 143)</td>
    <td align="left">#FFF68F</td>
  </tr>

  <tr>
    <td align="right">khaki3</td>
    <td align="center" style="background-color: rgb(205, 198, 115)">khaki3</td>
    <td align="left">rgb(205, 198, 115)</td>
    <td align="left">#CDC673</td>
  </tr>

  <tr>
    <td align="right">khaki4</td>
    <td align="center" style="background-color: rgb(139, 134, 78)">khaki4</td>
    <td align="left">rgb(139, 134, 78)</td>
    <td align="left">#8B864E</td>
  </tr>

  <tr>
    <td align="right">PaleGoldenrod</td>
    <td align="center" style="background-color: rgb(238, 232, 170)">PaleGoldenrod</td>
    <td align="left">rgb(238, 232, 170)</td>
    <td align="left">#EEE8AA</td>
  </tr>

  <tr>
    <td align="right">LemonChiffon</td>
    <td align="center" style="background-color: rgb(255, 250, 205)">LemonChiffon</td>
    <td align="left">rgb(255, 250, 205)</td>
    <td align="left">#FFFACD</td>
  </tr>

  <tr>
    <td align="right">LemonChiffon1</td>
    <td align="center" style="background-color: rgb(255, 250, 205)">LemonChiffon1</td>
    <td align="left">rgb(255, 250, 205)</td>
    <td align="left">#FFFACD</td>
  </tr>

  <tr>
    <td align="right">khaki</td>
    <td align="center" style="background-color: rgb(240, 230, 140)">khaki</td>
    <td align="left">rgb(240, 230, 140)</td>
    <td align="left">#F0E68C</td>
  </tr>

  <tr>
    <td align="right">LemonChiffon3</td>
    <td align="center" style="background-color: rgb(205, 201, 165)">LemonChiffon3</td>
    <td align="left">rgb(205, 201, 165)</td>
    <td align="left">#CDC9A5</td>
  </tr>

  <tr>
    <td align="right">LemonChiffon2</td>
    <td align="center" style="background-color: rgb(238, 233, 191)">LemonChiffon2</td>
    <td align="left">rgb(238, 233, 191)</td>
    <td align="left">#EEE9BF</td>
  </tr>

  <tr>
    <td align="right">MediumGoldenRod</td>
    <td align="center" style="background-color: rgb(209, 193, 102)">MediumGoldenRod</td>
    <td align="left">rgb(209, 193, 102)</td>
    <td align="left">#D1C166</td>
  </tr>

  <tr>
    <td align="right">cornsilk4</td>
    <td align="center" style="background-color: rgb(139, 136, 120)">cornsilk4</td>
    <td align="left">rgb(139, 136, 120)</td>
    <td align="left">#8B8878</td>
  </tr>

  <tr>
    <td align="right">gold</td>
    <td align="center" style="background-color: rgb(255, 215,  0)">gold</td>
    <td align="left">rgb(255, 215,  0)</td>
    <td align="left">#FFD700</td>
  </tr>

  <tr>
    <td align="right">gold1</td>
    <td align="center" style="background-color: rgb(255, 215,  0)">gold1</td>
    <td align="left">rgb(255, 215,  0)</td>
    <td align="left">#FFD700</td>
  </tr>

  <tr>
    <td align="right">gold2</td>
    <td align="center" style="background-color: rgb(238, 201,  0)">gold2</td>
    <td align="left">rgb(238, 201,  0)</td>
    <td align="left">#EEC900</td>
  </tr>

  <tr>
    <td align="right">gold3</td>
    <td align="center" style="background-color: rgb(205, 173,  0)">gold3</td>
    <td align="left">rgb(205, 173,  0)</td>
    <td align="left">#CDAD00</td>
  </tr>

  <tr>
    <td align="right">gold4</td>
    <td align="center" style="background-color: rgb(139, 117,  0)">gold4</td>
    <td align="left">rgb(139, 117,  0)</td>
    <td align="left">#8B7500</td>
  </tr>

  <tr>
    <td align="right">LightGoldenrod</td>
    <td align="center" style="background-color: rgb(238, 221, 130)">LightGoldenrod</td>
    <td align="left">rgb(238, 221, 130)</td>
    <td align="left">#EEDD82</td>
  </tr>

  <tr>
    <td align="right">LightGoldenrod4</td>
    <td align="center" style="background-color: rgb(139, 129, 76)">LightGoldenrod4</td>
    <td align="left">rgb(139, 129, 76)</td>
    <td align="left">#8B814C</td>
  </tr>

  <tr>
    <td align="right">LightGoldenrod1</td>
    <td align="center" style="background-color: rgb(255, 236, 139)">LightGoldenrod1</td>
    <td align="left">rgb(255, 236, 139)</td>
    <td align="left">#FFEC8B</td>
  </tr>

  <tr>
    <td align="right">LightGoldenrod3</td>
    <td align="center" style="background-color: rgb(205, 190, 112)">LightGoldenrod3</td>
    <td align="left">rgb(205, 190, 112)</td>
    <td align="left">#CDBE70</td>
  </tr>

  <tr>
    <td align="right">LightGoldenrod2</td>
    <td align="center" style="background-color: rgb(238, 220, 130)">LightGoldenrod2</td>
    <td align="left">rgb(238, 220, 130)</td>
    <td align="left">#EEDC82</td>
  </tr>

  <tr>
    <td align="right">cornsilk3</td>
    <td align="center" style="background-color: rgb(205, 200, 177)">cornsilk3</td>
    <td align="left">rgb(205, 200, 177)</td>
    <td align="left">#CDC8B1</td>
  </tr>

  <tr>
    <td align="right">cornsilk2</td>
    <td align="center" style="background-color: rgb(238, 232, 205)">cornsilk2</td>
    <td align="left">rgb(238, 232, 205)</td>
    <td align="left">#EEE8CD</td>
  </tr>

  <tr>
    <td align="right">cornsilk</td>
    <td align="center" style="background-color: rgb(255, 248, 220)">cornsilk</td>
    <td align="left">rgb(255, 248, 220)</td>
    <td align="left">#FFF8DC</td>
  </tr>

  <tr>
    <td align="right">cornsilk1</td>
    <td align="center" style="background-color: rgb(255, 248, 220)">cornsilk1</td>
    <td align="left">rgb(255, 248, 220)</td>
    <td align="left">#FFF8DC</td>
  </tr>

  <tr>
    <td align="right">goldenrod</td>
    <td align="center" style="background-color: rgb(218, 165, 32)">goldenrod</td>
    <td align="left">rgb(218, 165, 32)</td>
    <td align="left">#DAA520</td>
  </tr>

  <tr>
    <td align="right">goldenrod1</td>
    <td align="center" style="background-color: rgb(255, 193, 37)">goldenrod1</td>
    <td align="left">rgb(255, 193, 37)</td>
    <td align="left">#FFC125</td>
  </tr>

  <tr>
    <td align="right">goldenrod2</td>
    <td align="center" style="background-color: rgb(238, 180, 34)">goldenrod2</td>
    <td align="left">rgb(238, 180, 34)</td>
    <td align="left">#EEB422</td>
  </tr>

  <tr>
    <td align="right">goldenrod3</td>
    <td align="center" style="background-color: rgb(205, 155, 29)">goldenrod3</td>
    <td align="left">rgb(205, 155, 29)</td>
    <td align="left">#CD9B1D</td>
  </tr>

  <tr>
    <td align="right">goldenrod4</td>
    <td align="center" style="background-color: rgb(139, 105, 20)">goldenrod4</td>
    <td align="left">rgb(139, 105, 20)</td>
    <td align="left">#8B6914</td>
  </tr>

  <tr>
    <td align="right">DarkGoldenrod</td>
    <td align="center" style="background-color: rgb(184, 134, 11)">DarkGoldenrod</td>
    <td align="left">rgb(184, 134, 11)</td>
    <td align="left">#B8860B</td>
  </tr>

  <tr>
    <td align="right">DarkGoldenrod1</td>
    <td align="center" style="background-color: rgb(255, 185, 15)">DarkGoldenrod1</td>
    <td align="left">rgb(255, 185, 15)</td>
    <td align="left">#FFB90F</td>
  </tr>

  <tr>
    <td align="right">DarkGoldenrod2</td>
    <td align="center" style="background-color: rgb(238, 173, 14)">DarkGoldenrod2</td>
    <td align="left">rgb(238, 173, 14)</td>
    <td align="left">#EEAD0E</td>
  </tr>

  <tr>
    <td align="right">DarkGoldenrod3</td>
    <td align="center" style="background-color: rgb(205, 149, 12)">DarkGoldenrod3</td>
    <td align="left">rgb(205, 149, 12)</td>
    <td align="left">#CD950C</td>
  </tr>

  <tr>
    <td align="right">DarkGoldenrod4</td>
    <td align="center" style="background-color: rgb(139, 101,  8)">DarkGoldenrod4</td>
    <td align="left">rgb(139, 101,  8)</td>
    <td align="left">#8B6508</td>
  </tr>

  <tr>
    <td align="right">FloralWhite</td>
    <td align="center" style="background-color: rgb(255, 250, 240)">FloralWhite</td>
    <td align="left">rgb(255, 250, 240)</td>
    <td align="left">#FFFAF0</td>
  </tr>

  <tr>
    <td align="right">wheat2</td>
    <td align="center" style="background-color: rgb(238, 216, 174)">wheat2</td>
    <td align="left">rgb(238, 216, 174)</td>
    <td align="left">#EED8AE</td>
  </tr>

  <tr>
    <td align="right">OldLace</td>
    <td align="center" style="background-color: rgb(253, 245, 230)">OldLace</td>
    <td align="left">rgb(253, 245, 230)</td>
    <td align="left">#FDF5E6</td>
  </tr>

  <tr>
    <td align="right">wheat</td>
    <td align="center" style="background-color: rgb(245, 222, 179)">wheat</td>
    <td align="left">rgb(245, 222, 179)</td>
    <td align="left">#F5DEB3</td>
  </tr>

  <tr>
    <td align="right">wheat1</td>
    <td align="center" style="background-color: rgb(255, 231, 186)">wheat1</td>
    <td align="left">rgb(255, 231, 186)</td>
    <td align="left">#FFE7BA</td>
  </tr>

  <tr>
    <td align="right">wheat3</td>
    <td align="center" style="background-color: rgb(205, 186, 150)">wheat3</td>
    <td align="left">rgb(205, 186, 150)</td>
    <td align="left">#CDBA96</td>
  </tr>

  <tr>
    <td align="right">orange</td>
    <td align="center" style="background-color: rgb(255, 165,  0)">orange</td>
    <td align="left">rgb(255, 165,  0)</td>
    <td align="left">#FFA500</td>
  </tr>

  <tr>
    <td align="right">orange1</td>
    <td align="center" style="background-color: rgb(255, 165,  0)">orange1</td>
    <td align="left">rgb(255, 165,  0)</td>
    <td align="left">#FFA500</td>
  </tr>

  <tr>
    <td align="right">orange2</td>
    <td align="center" style="background-color: rgb(238, 154,  0)">orange2</td>
    <td align="left">rgb(238, 154,  0)</td>
    <td align="left">#EE9A00</td>
  </tr>

  <tr>
    <td align="right">orange3</td>
    <td align="center" style="background-color: rgb(205, 133,  0)">orange3</td>
    <td align="left">rgb(205, 133,  0)</td>
    <td align="left">#CD8500</td>
  </tr>

  <tr>
    <td align="right">orange4</td>
    <td align="center" style="background-color: rgb(139, 90,   0)">orange4</td>
    <td align="left">rgb(139, 90,   0)</td>
    <td align="left">#8B5A00</td>
  </tr>

  <tr>
    <td align="right">wheat4</td>
    <td align="center" style="background-color: rgb(139, 126, 102)">wheat4</td>
    <td align="left">rgb(139, 126, 102)</td>
    <td align="left">#8B7E66</td>
  </tr>

  <tr>
    <td align="right">moccasin</td>
    <td align="center" style="background-color: rgb(255, 228, 181)">moccasin</td>
    <td align="left">rgb(255, 228, 181)</td>
    <td align="left">#FFE4B5</td>
  </tr>

  <tr>
    <td align="right">PapayaWhip</td>
    <td align="center" style="background-color: rgb(255, 239, 213)">PapayaWhip</td>
    <td align="left">rgb(255, 239, 213)</td>
    <td align="left">#FFEFD5</td>
  </tr>

  <tr>
    <td align="right">NavajoWhite3</td>
    <td align="center" style="background-color: rgb(205, 179, 139)">NavajoWhite3</td>
    <td align="left">rgb(205, 179, 139)</td>
    <td align="left">#CDB38B</td>
  </tr>

  <tr>
    <td align="right">BlanchedAlmond</td>
    <td align="center" style="background-color: rgb(255, 235, 205)">BlanchedAlmond</td>
    <td align="left">rgb(255, 235, 205)</td>
    <td align="left">#FFEBCD</td>
  </tr>

  <tr>
    <td align="right">NavajoWhite</td>
    <td align="center" style="background-color: rgb(255, 222, 173)">NavajoWhite</td>
    <td align="left">rgb(255, 222, 173)</td>
    <td align="left">#FFDEAD</td>
  </tr>

  <tr>
    <td align="right">NavajoWhite1</td>
    <td align="center" style="background-color: rgb(255, 222, 173)">NavajoWhite1</td>
    <td align="left">rgb(255, 222, 173)</td>
    <td align="left">#FFDEAD</td>
  </tr>

  <tr>
    <td align="right">NavajoWhite2</td>
    <td align="center" style="background-color: rgb(238, 207, 161)">NavajoWhite2</td>
    <td align="left">rgb(238, 207, 161)</td>
    <td align="left">#EECFA1</td>
  </tr>

  <tr>
    <td align="right">NavajoWhite4</td>
    <td align="center" style="background-color: rgb(139, 121, 94)">NavajoWhite4</td>
    <td align="left">rgb(139, 121, 94)</td>
    <td align="left">#8B795E</td>
  </tr>

  <tr>
    <td align="right">AntiqueWhite4</td>
    <td align="center" style="background-color: rgb(139, 131, 120)">AntiqueWhite4</td>
    <td align="left">rgb(139, 131, 120)</td>
    <td align="left">#8B8378</td>
  </tr>

  <tr>
    <td align="right">AntiqueWhite</td>
    <td align="center" style="background-color: rgb(250, 235, 215)">AntiqueWhite</td>
    <td align="left">rgb(250, 235, 215)</td>
    <td align="left">#FAEBD7</td>
  </tr>

  <tr>
    <td align="right">tan</td>
    <td align="center" style="background-color: rgb(210, 180, 140)">tan</td>
    <td align="left">rgb(210, 180, 140)</td>
    <td align="left">#D2B48C</td>
  </tr>

  <tr>
    <td align="right">bisque4</td>
    <td align="center" style="background-color: rgb(139, 125, 107)">bisque4</td>
    <td align="left">rgb(139, 125, 107)</td>
    <td align="left">#8B7D6B</td>
  </tr>

  <tr>
    <td align="right">burlywood</td>
    <td align="center" style="background-color: rgb(222, 184, 135)">burlywood</td>
    <td align="left">rgb(222, 184, 135)</td>
    <td align="left">#DEB887</td>
  </tr>

  <tr>
    <td align="right">AntiqueWhite2</td>
    <td align="center" style="background-color: rgb(238, 223, 204)">AntiqueWhite2</td>
    <td align="left">rgb(238, 223, 204)</td>
    <td align="left">#EEDFCC</td>
  </tr>

  <tr>
    <td align="right">burlywood1</td>
    <td align="center" style="background-color: rgb(255, 211, 155)">burlywood1</td>
    <td align="left">rgb(255, 211, 155)</td>
    <td align="left">#FFD39B</td>
  </tr>

  <tr>
    <td align="right">burlywood3</td>
    <td align="center" style="background-color: rgb(205, 170, 125)">burlywood3</td>
    <td align="left">rgb(205, 170, 125)</td>
    <td align="left">#CDAA7D</td>
  </tr>

  <tr>
    <td align="right">burlywood2</td>
    <td align="center" style="background-color: rgb(238, 197, 145)">burlywood2</td>
    <td align="left">rgb(238, 197, 145)</td>
    <td align="left">#EEC591</td>
  </tr>

  <tr>
    <td align="right">AntiqueWhite1</td>
    <td align="center" style="background-color: rgb(255, 239, 219)">AntiqueWhite1</td>
    <td align="left">rgb(255, 239, 219)</td>
    <td align="left">#FFEFDB</td>
  </tr>

  <tr>
    <td align="right">burlywood4</td>
    <td align="center" style="background-color: rgb(139, 115, 85)">burlywood4</td>
    <td align="left">rgb(139, 115, 85)</td>
    <td align="left">#8B7355</td>
  </tr>

  <tr>
    <td align="right">AntiqueWhite3</td>
    <td align="center" style="background-color: rgb(205, 192, 176)">AntiqueWhite3</td>
    <td align="left">rgb(205, 192, 176)</td>
    <td align="left">#CDC0B0</td>
  </tr>

  <tr>
    <td align="right">DarkOrange</td>
    <td align="center" style="background-color: rgb(255, 140,  0)">DarkOrange</td>
    <td align="left">rgb(255, 140,  0)</td>
    <td align="left">#FF8C00</td>
  </tr>

  <tr>
    <td align="right">bisque2</td>
    <td align="center" style="background-color: rgb(238, 213, 183)">bisque2</td>
    <td align="left">rgb(238, 213, 183)</td>
    <td align="left">#EED5B7</td>
  </tr>

  <tr>
    <td align="right">bisque</td>
    <td align="center" style="background-color: rgb(255, 228, 196)">bisque</td>
    <td align="left">rgb(255, 228, 196)</td>
    <td align="left">#FFE4C4</td>
  </tr>

  <tr>
    <td align="right">bisque1</td>
    <td align="center" style="background-color: rgb(255, 228, 196)">bisque1</td>
    <td align="left">rgb(255, 228, 196)</td>
    <td align="left">#FFE4C4</td>
  </tr>

  <tr>
    <td align="right">bisque3</td>
    <td align="center" style="background-color: rgb(205, 183, 158)">bisque3</td>
    <td align="left">rgb(205, 183, 158)</td>
    <td align="left">#CDB79E</td>
  </tr>

  <tr>
    <td align="right">DarkOrange1</td>
    <td align="center" style="background-color: rgb(255, 127,  0)">DarkOrange1</td>
    <td align="left">rgb(255, 127,  0)</td>
    <td align="left">#FF7F00</td>
  </tr>

  <tr>
    <td align="right">linen</td>
    <td align="center" style="background-color: rgb(250, 240, 230)">linen</td>
    <td align="left">rgb(250, 240, 230)</td>
    <td align="left">#FAF0E6</td>
  </tr>

  <tr>
    <td align="right">DarkOrange2</td>
    <td align="center" style="background-color: rgb(238, 118,  0)">DarkOrange2</td>
    <td align="left">rgb(238, 118,  0)</td>
    <td align="left">#EE7600</td>
  </tr>

  <tr>
    <td align="right">DarkOrange3</td>
    <td align="center" style="background-color: rgb(205, 102,  0)">DarkOrange3</td>
    <td align="left">rgb(205, 102,  0)</td>
    <td align="left">#CD6600</td>
  </tr>

  <tr>
    <td align="right">DarkOrange4</td>
    <td align="center" style="background-color: rgb(139, 69,   0)">DarkOrange4</td>
    <td align="left">rgb(139, 69,   0)</td>
    <td align="left">#8B4500</td>
  </tr>

  <tr>
    <td align="right">peru</td>
    <td align="center" style="background-color: rgb(205, 133, 63)">peru</td>
    <td align="left">rgb(205, 133, 63)</td>
    <td align="left">#CD853F</td>
  </tr>

  <tr>
    <td align="right">tan1</td>
    <td align="center" style="background-color: rgb(255, 165, 79)">tan1</td>
    <td align="left">rgb(255, 165, 79)</td>
    <td align="left">#FFA54F</td>
  </tr>

  <tr>
    <td align="right">tan2</td>
    <td align="center" style="background-color: rgb(238, 154, 73)">tan2</td>
    <td align="left">rgb(238, 154, 73)</td>
    <td align="left">#EE9A49</td>
  </tr>

  <tr>
    <td align="right">tan3</td>
    <td align="center" style="background-color: rgb(205, 133, 63)">tan3</td>
    <td align="left">rgb(205, 133, 63)</td>
    <td align="left">#CD853F</td>
  </tr>

  <tr>
    <td align="right">tan4</td>
    <td align="center" style="background-color: rgb(139, 90,  43)">tan4</td>
    <td align="left">rgb(139, 90,  43)</td>
    <td align="left">#8B5A2B</td>
  </tr>

  <tr>
    <td align="right">PeachPuff</td>
    <td align="center" style="background-color: rgb(255, 218, 185)">PeachPuff</td>
    <td align="left">rgb(255, 218, 185)</td>
    <td align="left">#FFDAB9</td>
  </tr>

  <tr>
    <td align="right">PeachPuff1</td>
    <td align="center" style="background-color: rgb(255, 218, 185)">PeachPuff1</td>
    <td align="left">rgb(255, 218, 185)</td>
    <td align="left">#FFDAB9</td>
  </tr>

  <tr>
    <td align="right">PeachPuff4</td>
    <td align="center" style="background-color: rgb(139, 119, 101)">PeachPuff4</td>
    <td align="left">rgb(139, 119, 101)</td>
    <td align="left">#8B7765</td>
  </tr>

  <tr>
    <td align="right">PeachPuff2</td>
    <td align="center" style="background-color: rgb(238, 203, 173)">PeachPuff2</td>
    <td align="left">rgb(238, 203, 173)</td>
    <td align="left">#EECBAD</td>
  </tr>

  <tr>
    <td align="right">PeachPuff3</td>
    <td align="center" style="background-color: rgb(205, 175, 149)">PeachPuff3</td>
    <td align="left">rgb(205, 175, 149)</td>
    <td align="left">#CDAF95</td>
  </tr>

  <tr>
    <td align="right">SandyBrown</td>
    <td align="center" style="background-color: rgb(244, 164, 96)">SandyBrown</td>
    <td align="left">rgb(244, 164, 96)</td>
    <td align="left">#F4A460</td>
  </tr>

  <tr>
    <td align="right">seashell4</td>
    <td align="center" style="background-color: rgb(139, 134, 130)">seashell4</td>
    <td align="left">rgb(139, 134, 130)</td>
    <td align="left">#8B8682</td>
  </tr>

  <tr>
    <td align="right">seashell2</td>
    <td align="center" style="background-color: rgb(238, 229, 222)">seashell2</td>
    <td align="left">rgb(238, 229, 222)</td>
    <td align="left">#EEE5DE</td>
  </tr>

  <tr>
    <td align="right">seashell3</td>
    <td align="center" style="background-color: rgb(205, 197, 191)">seashell3</td>
    <td align="left">rgb(205, 197, 191)</td>
    <td align="left">#CDC5BF</td>
  </tr>

  <tr>
    <td align="right">chocolate</td>
    <td align="center" style="background-color: rgb(210, 105, 30)">chocolate</td>
    <td align="left">rgb(210, 105, 30)</td>
    <td align="left">#D2691E</td>
  </tr>

  <tr>
    <td align="right">chocolate1</td>
    <td align="center" style="background-color: rgb(255, 127, 36)">chocolate1</td>
    <td align="left">rgb(255, 127, 36)</td>
    <td align="left">#FF7F24</td>
  </tr>

  <tr>
    <td align="right">chocolate2</td>
    <td align="center" style="background-color: rgb(238, 118, 33)">chocolate2</td>
    <td align="left">rgb(238, 118, 33)</td>
    <td align="left">#EE7621</td>
  </tr>

  <tr>
    <td align="right">chocolate3</td>
    <td align="center" style="background-color: rgb(205, 102, 29)">chocolate3</td>
    <td align="left">rgb(205, 102, 29)</td>
    <td align="left">#CD661D</td>
  </tr>

  <tr>
    <td align="right">chocolate4</td>
    <td align="center" style="background-color: rgb(139, 69,  19)">chocolate4</td>
    <td align="left">rgb(139, 69,  19)</td>
    <td align="left">#8B4513</td>
  </tr>

  <tr>
    <td align="right">SaddleBrown</td>
    <td align="center" style="background-color: rgb(139, 69,  19)">SaddleBrown</td>
    <td align="left">rgb(139, 69,  19)</td>
    <td align="left">#8B4513</td>
  </tr>

  <tr>
    <td align="right">seashell</td>
    <td align="center" style="background-color: rgb(255, 245, 238)">seashell</td>
    <td align="left">rgb(255, 245, 238)</td>
    <td align="left">#FFF5EE</td>
  </tr>

  <tr>
    <td align="right">seashell1</td>
    <td align="center" style="background-color: rgb(255, 245, 238)">seashell1</td>
    <td align="left">rgb(255, 245, 238)</td>
    <td align="left">#FFF5EE</td>
  </tr>

  <tr>
    <td align="right">sienna4</td>
    <td align="center" style="background-color: rgb(139, 71,  38)">sienna4</td>
    <td align="left">rgb(139, 71,  38)</td>
    <td align="left">#8B4726</td>
  </tr>

  <tr>
    <td align="right">sienna</td>
    <td align="center" style="background-color: rgb(160, 82,  45)">sienna</td>
    <td align="left">rgb(160, 82,  45)</td>
    <td align="left">#A0522D</td>
  </tr>

  <tr>
    <td align="right">sienna1</td>
    <td align="center" style="background-color: rgb(255, 130, 71)">sienna1</td>
    <td align="left">rgb(255, 130, 71)</td>
    <td align="left">#FF8247</td>
  </tr>

  <tr>
    <td align="right">sienna2</td>
    <td align="center" style="background-color: rgb(238, 121, 66)">sienna2</td>
    <td align="left">rgb(238, 121, 66)</td>
    <td align="left">#EE7942</td>
  </tr>

  <tr>
    <td align="right">sienna3</td>
    <td align="center" style="background-color: rgb(205, 104, 57)">sienna3</td>
    <td align="left">rgb(205, 104, 57)</td>
    <td align="left">#CD6839</td>
  </tr>

  <tr>
    <td align="right">LightSalmon3</td>
    <td align="center" style="background-color: rgb(205, 129, 98)">LightSalmon3</td>
    <td align="left">rgb(205, 129, 98)</td>
    <td align="left">#CD8162</td>
  </tr>

  <tr>
    <td align="right">LightSalmon</td>
    <td align="center" style="background-color: rgb(255, 160, 122)">LightSalmon</td>
    <td align="left">rgb(255, 160, 122)</td>
    <td align="left">#FFA07A</td>
  </tr>

  <tr>
    <td align="right">LightSalmon1</td>
    <td align="center" style="background-color: rgb(255, 160, 122)">LightSalmon1</td>
    <td align="left">rgb(255, 160, 122)</td>
    <td align="left">#FFA07A</td>
  </tr>

  <tr>
    <td align="right">LightSalmon4</td>
    <td align="center" style="background-color: rgb(139, 87,  66)">LightSalmon4</td>
    <td align="left">rgb(139, 87,  66)</td>
    <td align="left">#8B5742</td>
  </tr>

  <tr>
    <td align="right">LightSalmon2</td>
    <td align="center" style="background-color: rgb(238, 149, 114)">LightSalmon2</td>
    <td align="left">rgb(238, 149, 114)</td>
    <td align="left">#EE9572</td>
  </tr>

  <tr>
    <td align="right">coral</td>
    <td align="center" style="background-color: rgb(255, 127, 80)">coral</td>
    <td align="left">rgb(255, 127, 80)</td>
    <td align="left">#FF7F50</td>
  </tr>

  <tr>
    <td align="right">OrangeRed</td>
    <td align="center" style="background-color: rgb(255, 69,   0)">OrangeRed</td>
    <td align="left">rgb(255, 69,   0)</td>
    <td align="left">#FF4500</td>
  </tr>

  <tr>
    <td align="right">OrangeRed1</td>
    <td align="center" style="background-color: rgb(255, 69,   0)">OrangeRed1</td>
    <td align="left">rgb(255, 69,   0)</td>
    <td align="left">#FF4500</td>
  </tr>

  <tr>
    <td align="right">OrangeRed2</td>
    <td align="center" style="background-color: rgb(238, 64,   0)">OrangeRed2</td>
    <td align="left">rgb(238, 64,   0)</td>
    <td align="left">#EE4000</td>
  </tr>

  <tr>
    <td align="right">OrangeRed3</td>
    <td align="center" style="background-color: rgb(205, 55,   0)">OrangeRed3</td>
    <td align="left">rgb(205, 55,   0)</td>
    <td align="left">#CD3700</td>
  </tr>

  <tr>
    <td align="right">OrangeRed4</td>
    <td align="center" style="background-color: rgb(139, 37,   0)">OrangeRed4</td>
    <td align="left">rgb(139, 37,   0)</td>
    <td align="left">#8B2500</td>
  </tr>

  <tr>
    <td align="right">DarkSalmon</td>
    <td align="center" style="background-color: rgb(233, 150, 122)">DarkSalmon</td>
    <td align="left">rgb(233, 150, 122)</td>
    <td align="left">#E9967A</td>
  </tr>

  <tr>
    <td align="right">salmon1</td>
    <td align="center" style="background-color: rgb(255, 140, 105)">salmon1</td>
    <td align="left">rgb(255, 140, 105)</td>
    <td align="left">#FF8C69</td>
  </tr>

  <tr>
    <td align="right">salmon2</td>
    <td align="center" style="background-color: rgb(238, 130, 98)">salmon2</td>
    <td align="left">rgb(238, 130, 98)</td>
    <td align="left">#EE8262</td>
  </tr>

  <tr>
    <td align="right">salmon3</td>
    <td align="center" style="background-color: rgb(205, 112, 84)">salmon3</td>
    <td align="left">rgb(205, 112, 84)</td>
    <td align="left">#CD7054</td>
  </tr>

  <tr>
    <td align="right">salmon4</td>
    <td align="center" style="background-color: rgb(139, 76,  57)">salmon4</td>
    <td align="left">rgb(139, 76,  57)</td>
    <td align="left">#8B4C39</td>
  </tr>

  <tr>
    <td align="right">coral1</td>
    <td align="center" style="background-color: rgb(255, 114, 86)">coral1</td>
    <td align="left">rgb(255, 114, 86)</td>
    <td align="left">#FF7256</td>
  </tr>

  <tr>
    <td align="right">coral2</td>
    <td align="center" style="background-color: rgb(238, 106, 80)">coral2</td>
    <td align="left">rgb(238, 106, 80)</td>
    <td align="left">#EE6A50</td>
  </tr>

  <tr>
    <td align="right">coral3</td>
    <td align="center" style="background-color: rgb(205, 91,  69)">coral3</td>
    <td align="left">rgb(205, 91,  69)</td>
    <td align="left">#CD5B45</td>
  </tr>

  <tr>
    <td align="right">coral4</td>
    <td align="center" style="background-color: rgb(139, 62,  47)">coral4</td>
    <td align="left">rgb(139, 62,  47)</td>
    <td align="left">#8B3E2F</td>
  </tr>

  <tr>
    <td align="right">tomato4</td>
    <td align="center" style="background-color: rgb(139, 54,  38)">tomato4</td>
    <td align="left">rgb(139, 54,  38)</td>
    <td align="left">#8B3626</td>
  </tr>

  <tr>
    <td align="right">tomato</td>
    <td align="center" style="background-color: rgb(255, 99,  71)">tomato</td>
    <td align="left">rgb(255, 99,  71)</td>
    <td align="left">#FF6347</td>
  </tr>

  <tr>
    <td align="right">tomato1</td>
    <td align="center" style="background-color: rgb(255, 99,  71)">tomato1</td>
    <td align="left">rgb(255, 99,  71)</td>
    <td align="left">#FF6347</td>
  </tr>

  <tr>
    <td align="right">tomato2</td>
    <td align="center" style="background-color: rgb(238, 92,  66)">tomato2</td>
    <td align="left">rgb(238, 92,  66)</td>
    <td align="left">#EE5C42</td>
  </tr>

  <tr>
    <td align="right">tomato3</td>
    <td align="center" style="background-color: rgb(205, 79,  57)">tomato3</td>
    <td align="left">rgb(205, 79,  57)</td>
    <td align="left">#CD4F39</td>
  </tr>

  <tr>
    <td align="right">MistyRose4</td>
    <td align="center" style="background-color: rgb(139, 125, 123)">MistyRose4</td>
    <td align="left">rgb(139, 125, 123)</td>
    <td align="left">#8B7D7B</td>
  </tr>

  <tr>
    <td align="right">MistyRose2</td>
    <td align="center" style="background-color: rgb(238, 213, 210)">MistyRose2</td>
    <td align="left">rgb(238, 213, 210)</td>
    <td align="left">#EED5D2</td>
  </tr>

  <tr>
    <td align="right">MistyRose</td>
    <td align="center" style="background-color: rgb(255, 228, 225)">MistyRose</td>
    <td align="left">rgb(255, 228, 225)</td>
    <td align="left">#FFE4E1</td>
  </tr>

  <tr>
    <td align="right">MistyRose1</td>
    <td align="center" style="background-color: rgb(255, 228, 225)">MistyRose1</td>
    <td align="left">rgb(255, 228, 225)</td>
    <td align="left">#FFE4E1</td>
  </tr>

  <tr>
    <td align="right">salmon</td>
    <td align="center" style="background-color: rgb(250, 128, 114)">salmon</td>
    <td align="left">rgb(250, 128, 114)</td>
    <td align="left">#FA8072</td>
  </tr>

  <tr>
    <td align="right">MistyRose3</td>
    <td align="center" style="background-color: rgb(205, 183, 181)">MistyRose3</td>
    <td align="left">rgb(205, 183, 181)</td>
    <td align="left">#CDB7B5</td>
  </tr>

  <tr>
    <td align="right">white</td>
    <td align="center" style="background-color: rgb(255, 255, 255)">white</td>
    <td align="left">rgb(255, 255, 255)</td>
    <td align="left">#FFFFFF</td>
  </tr>

  <tr>
    <td align="right">gray100</td>
    <td align="center" style="background-color: rgb(255, 255, 255)">gray100</td>
    <td align="left">rgb(255, 255, 255)</td>
    <td align="left">#FFFFFF</td>
  </tr>

  <tr>
    <td align="right">grey100</td>
    <td align="center" style="background-color: rgb(255, 255, 255)">grey100</td>
    <td align="left">rgb(255, 255, 255)</td>
    <td align="left">#FFFFFF</td>
  </tr>

  <tr>
    <td align="right">grey100</td>
    <td align="center" style="background-color: rgb(255, 255, 255)">grey100</td>
    <td align="left">rgb(255, 255, 255)</td>
    <td align="left">#FFFFFF</td>
  </tr>

  <tr>
    <td align="right">gray99</td>
    <td align="center" style="background-color: rgb(252, 252, 252)">gray99</td>
    <td align="left">rgb(252, 252, 252)</td>
    <td align="left">#FCFCFC</td>
  </tr>

  <tr>
    <td align="right">grey99</td>
    <td align="center" style="background-color: rgb(252, 252, 252)">grey99</td>
    <td align="left">rgb(252, 252, 252)</td>
    <td align="left">#FCFCFC</td>
  </tr>

  <tr>
    <td align="right">gray98</td>
    <td align="center" style="background-color: rgb(250, 250, 250)">gray98</td>
    <td align="left">rgb(250, 250, 250)</td>
    <td align="left">#FAFAFA</td>
  </tr>

  <tr>
    <td align="right">grey98</td>
    <td align="center" style="background-color: rgb(250, 250, 250)">grey98</td>
    <td align="left">rgb(250, 250, 250)</td>
    <td align="left">#FAFAFA</td>
  </tr>

  <tr>
    <td align="right">gray97</td>
    <td align="center" style="background-color: rgb(247, 247, 247)">gray97</td>
    <td align="left">rgb(247, 247, 247)</td>
    <td align="left">#F7F7F7</td>
  </tr>

  <tr>
    <td align="right">grey97</td>
    <td align="center" style="background-color: rgb(247, 247, 247)">grey97</td>
    <td align="left">rgb(247, 247, 247)</td>
    <td align="left">#F7F7F7</td>
  </tr>

  <tr>
    <td align="right">gray96</td>
    <td align="center" style="background-color: rgb(245, 245, 245)">gray96</td>
    <td align="left">rgb(245, 245, 245)</td>
    <td align="left">#F5F5F5</td>
  </tr>

  <tr>
    <td align="right">grey96</td>
    <td align="center" style="background-color: rgb(245, 245, 245)">grey96</td>
    <td align="left">rgb(245, 245, 245)</td>
    <td align="left">#F5F5F5</td>
  </tr>

  <tr>
    <td align="right">WhiteSmoke</td>
    <td align="center" style="background-color: rgb(245, 245, 245)">WhiteSmoke</td>
    <td align="left">rgb(245, 245, 245)</td>
    <td align="left">#F5F5F5</td>
  </tr>

  <tr>
    <td align="right">gray95</td>
    <td align="center" style="background-color: rgb(242, 242, 242)">gray95</td>
    <td align="left">rgb(242, 242, 242)</td>
    <td align="left">#F2F2F2</td>
  </tr>

  <tr>
    <td align="right">grey95</td>
    <td align="center" style="background-color: rgb(242, 242, 242)">grey95</td>
    <td align="left">rgb(242, 242, 242)</td>
    <td align="left">#F2F2F2</td>
  </tr>

  <tr>
    <td align="right">gray94</td>
    <td align="center" style="background-color: rgb(240, 240, 240)">gray94</td>
    <td align="left">rgb(240, 240, 240)</td>
    <td align="left">#F0F0F0</td>
  </tr>

  <tr>
    <td align="right">grey94</td>
    <td align="center" style="background-color: rgb(240, 240, 240)">grey94</td>
    <td align="left">rgb(240, 240, 240)</td>
    <td align="left">#F0F0F0</td>
  </tr>

  <tr>
    <td align="right">gray93</td>
    <td align="center" style="background-color: rgb(237, 237, 237)">gray93</td>
    <td align="left">rgb(237, 237, 237)</td>
    <td align="left">#EDEDED</td>
  </tr>

  <tr>
    <td align="right">grey93</td>
    <td align="center" style="background-color: rgb(237, 237, 237)">grey93</td>
    <td align="left">rgb(237, 237, 237)</td>
    <td align="left">#EDEDED</td>
  </tr>

  <tr>
    <td align="right">gray92</td>
    <td align="center" style="background-color: rgb(235, 235, 235)">gray92</td>
    <td align="left">rgb(235, 235, 235)</td>
    <td align="left">#EBEBEB</td>
  </tr>

  <tr>
    <td align="right">grey92</td>
    <td align="center" style="background-color: rgb(235, 235, 235)">grey92</td>
    <td align="left">rgb(235, 235, 235)</td>
    <td align="left">#EBEBEB</td>
  </tr>

  <tr>
    <td align="right">gray91</td>
    <td align="center" style="background-color: rgb(232, 232, 232)">gray91</td>
    <td align="left">rgb(232, 232, 232)</td>
    <td align="left">#E8E8E8</td>
  </tr>

  <tr>
    <td align="right">grey91</td>
    <td align="center" style="background-color: rgb(232, 232, 232)">grey91</td>
    <td align="left">rgb(232, 232, 232)</td>
    <td align="left">#E8E8E8</td>
  </tr>

  <tr>
    <td align="right">gray90</td>
    <td align="center" style="background-color: rgb(229, 229, 229)">gray90</td>
    <td align="left">rgb(229, 229, 229)</td>
    <td align="left">#E5E5E5</td>
  </tr>

  <tr>
    <td align="right">grey90</td>
    <td align="center" style="background-color: rgb(229, 229, 229)">grey90</td>
    <td align="left">rgb(229, 229, 229)</td>
    <td align="left">#E5E5E5</td>
  </tr>

  <tr>
    <td align="right">gray89</td>
    <td align="center" style="background-color: rgb(227, 227, 227)">gray89</td>
    <td align="left">rgb(227, 227, 227)</td>
    <td align="left">#E3E3E3</td>
  </tr>

  <tr>
    <td align="right">grey89</td>
    <td align="center" style="background-color: rgb(227, 227, 227)">grey89</td>
    <td align="left">rgb(227, 227, 227)</td>
    <td align="left">#E3E3E3</td>
  </tr>

  <tr>
    <td align="right">gray88</td>
    <td align="center" style="background-color: rgb(224, 224, 224)">gray88</td>
    <td align="left">rgb(224, 224, 224)</td>
    <td align="left">#E0E0E0</td>
  </tr>

  <tr>
    <td align="right">grey88</td>
    <td align="center" style="background-color: rgb(224, 224, 224)">grey88</td>
    <td align="left">rgb(224, 224, 224)</td>
    <td align="left">#E0E0E0</td>
  </tr>

  <tr>
    <td align="right">gray87</td>
    <td align="center" style="background-color: rgb(222, 222, 222)">gray87</td>
    <td align="left">rgb(222, 222, 222)</td>
    <td align="left">#DEDEDE</td>
  </tr>

  <tr>
    <td align="right">grey87</td>
    <td align="center" style="background-color: rgb(222, 222, 222)">grey87</td>
    <td align="left">rgb(222, 222, 222)</td>
    <td align="left">#DEDEDE</td>
  </tr>

  <tr>
    <td align="right">gainsboro</td>
    <td align="center" style="background-color: rgb(220, 220, 220)">gainsboro</td>
    <td align="left">rgb(220, 220, 220)</td>
    <td align="left">#DCDCDC</td>
  </tr>

  <tr>
    <td align="right">gray86</td>
    <td align="center" style="background-color: rgb(219, 219, 219)">gray86</td>
    <td align="left">rgb(219, 219, 219)</td>
    <td align="left">#DBDBDB</td>
  </tr>

  <tr>
    <td align="right">grey86</td>
    <td align="center" style="background-color: rgb(219, 219, 219)">grey86</td>
    <td align="left">rgb(219, 219, 219)</td>
    <td align="left">#DBDBDB</td>
  </tr>

  <tr>
    <td align="right">gray85</td>
    <td align="center" style="background-color: rgb(217, 217, 217)">gray85</td>
    <td align="left">rgb(217, 217, 217)</td>
    <td align="left">#D9D9D9</td>
  </tr>

  <tr>
    <td align="right">grey85</td>
    <td align="center" style="background-color: rgb(217, 217, 217)">grey85</td>
    <td align="left">rgb(217, 217, 217)</td>
    <td align="left">#D9D9D9</td>
  </tr>

  <tr>
    <td align="right">gray84</td>
    <td align="center" style="background-color: rgb(214, 214, 214)">gray84</td>
    <td align="left">rgb(214, 214, 214)</td>
    <td align="left">#D6D6D6</td>
  </tr>

  <tr>
    <td align="right">grey84</td>
    <td align="center" style="background-color: rgb(214, 214, 214)">grey84</td>
    <td align="left">rgb(214, 214, 214)</td>
    <td align="left">#D6D6D6</td>
  </tr>

  <tr>
    <td align="right">gray83</td>
    <td align="center" style="background-color: rgb(212, 212, 212)">gray83</td>
    <td align="left">rgb(212, 212, 212)</td>
    <td align="left">#D4D4D4</td>
  </tr>

  <tr>
    <td align="right">grey83</td>
    <td align="center" style="background-color: rgb(212, 212, 212)">grey83</td>
    <td align="left">rgb(212, 212, 212)</td>
    <td align="left">#D4D4D4</td>
  </tr>

  <tr>
    <td align="right">LightGray</td>
    <td align="center" style="background-color: rgb(211, 211, 211)">LightGray</td>
    <td align="left">rgb(211, 211, 211)</td>
    <td align="left">#D3D3D3</td>
  </tr>

  <tr>
    <td align="right">LightGrey</td>
    <td align="center" style="background-color: rgb(211, 211, 211)">LightGrey</td>
    <td align="left">rgb(211, 211, 211)</td>
    <td align="left">#D3D3D3</td>
  </tr>

  <tr>
    <td align="right">gray82</td>
    <td align="center" style="background-color: rgb(209, 209, 209)">gray82</td>
    <td align="left">rgb(209, 209, 209)</td>
    <td align="left">#D1D1D1</td>
  </tr>

  <tr>
    <td align="right">grey82</td>
    <td align="center" style="background-color: rgb(209, 209, 209)">grey82</td>
    <td align="left">rgb(209, 209, 209)</td>
    <td align="left">#D1D1D1</td>
  </tr>

  <tr>
    <td align="right">gray81</td>
    <td align="center" style="background-color: rgb(207, 207, 207)">gray81</td>
    <td align="left">rgb(207, 207, 207)</td>
    <td align="left">#CFCFCF</td>
  </tr>

  <tr>
    <td align="right">grey81</td>
    <td align="center" style="background-color: rgb(207, 207, 207)">grey81</td>
    <td align="left">rgb(207, 207, 207)</td>
    <td align="left">#CFCFCF</td>
  </tr>

  <tr>
    <td align="right">gray80</td>
    <td align="center" style="background-color: rgb(204, 204, 204)">gray80</td>
    <td align="left">rgb(204, 204, 204)</td>
    <td align="left">#CCCCCC</td>
  </tr>

  <tr>
    <td align="right">grey80</td>
    <td align="center" style="background-color: rgb(204, 204, 204)">grey80</td>
    <td align="left">rgb(204, 204, 204)</td>
    <td align="left">#CCCCCC</td>
  </tr>

  <tr>
    <td align="right">gray79</td>
    <td align="center" style="background-color: rgb(201, 201, 201)">gray79</td>
    <td align="left">rgb(201, 201, 201)</td>
    <td align="left">#C9C9C9</td>
  </tr>

  <tr>
    <td align="right">grey79</td>
    <td align="center" style="background-color: rgb(201, 201, 201)">grey79</td>
    <td align="left">rgb(201, 201, 201)</td>
    <td align="left">#C9C9C9</td>
  </tr>

  <tr>
    <td align="right">gray78</td>
    <td align="center" style="background-color: rgb(199, 199, 199)">gray78</td>
    <td align="left">rgb(199, 199, 199)</td>
    <td align="left">#C7C7C7</td>
  </tr>

  <tr>
    <td align="right">grey78</td>
    <td align="center" style="background-color: rgb(199, 199, 199)">grey78</td>
    <td align="left">rgb(199, 199, 199)</td>
    <td align="left">#C7C7C7</td>
  </tr>

  <tr>
    <td align="right">gray77</td>
    <td align="center" style="background-color: rgb(196, 196, 196)">gray77</td>
    <td align="left">rgb(196, 196, 196)</td>
    <td align="left">#C4C4C4</td>
  </tr>

  <tr>
    <td align="right">grey77</td>
    <td align="center" style="background-color: rgb(196, 196, 196)">grey77</td>
    <td align="left">rgb(196, 196, 196)</td>
    <td align="left">#C4C4C4</td>
  </tr>

  <tr>
    <td align="right">gray76</td>
    <td align="center" style="background-color: rgb(194, 194, 194)">gray76</td>
    <td align="left">rgb(194, 194, 194)</td>
    <td align="left">#C2C2C2</td>
  </tr>

  <tr>
    <td align="right">grey76</td>
    <td align="center" style="background-color: rgb(194, 194, 194)">grey76</td>
    <td align="left">rgb(194, 194, 194)</td>
    <td align="left">#C2C2C2</td>
  </tr>

  <tr>
    <td align="right">silver</td>
    <td align="center" style="background-color: rgb(192, 192, 192)">silver</td>
    <td align="left">rgb(192, 192, 192)</td>
    <td align="left">#C0C0C0</td>
  </tr>

  <tr>
    <td align="right">gray75</td>
    <td align="center" style="background-color: rgb(191, 191, 191)">gray75</td>
    <td align="left">rgb(191, 191, 191)</td>
    <td align="left">#BFBFBF</td>
  </tr>

  <tr>
    <td align="right">grey75</td>
    <td align="center" style="background-color: rgb(191, 191, 191)">grey75</td>
    <td align="left">rgb(191, 191, 191)</td>
    <td align="left">#BFBFBF</td>
  </tr>

  <tr>
    <td align="right">gray74</td>
    <td align="center" style="background-color: rgb(189, 189, 189)">gray74</td>
    <td align="left">rgb(189, 189, 189)</td>
    <td align="left">#BDBDBD</td>
  </tr>

  <tr>
    <td align="right">grey74</td>
    <td align="center" style="background-color: rgb(189, 189, 189)">grey74</td>
    <td align="left">rgb(189, 189, 189)</td>
    <td align="left">#BDBDBD</td>
  </tr>

  <tr>
    <td align="right">gray73</td>
    <td align="center" style="background-color: rgb(186, 186, 186)">gray73</td>
    <td align="left">rgb(186, 186, 186)</td>
    <td align="left">#BABABA</td>
  </tr>

  <tr>
    <td align="right">grey73</td>
    <td align="center" style="background-color: rgb(186, 186, 186)">grey73</td>
    <td align="left">rgb(186, 186, 186)</td>
    <td align="left">#BABABA</td>
  </tr>

  <tr>
    <td align="right">gray72</td>
    <td align="center" style="background-color: rgb(184, 184, 184)">gray72</td>
    <td align="left">rgb(184, 184, 184)</td>
    <td align="left">#B8B8B8</td>
  </tr>

  <tr>
    <td align="right">grey72</td>
    <td align="center" style="background-color: rgb(184, 184, 184)">grey72</td>
    <td align="left">rgb(184, 184, 184)</td>
    <td align="left">#B8B8B8</td>
  </tr>

  <tr>
    <td align="right">gray71</td>
    <td align="center" style="background-color: rgb(181, 181, 181)">gray71</td>
    <td align="left">rgb(181, 181, 181)</td>
    <td align="left">#B5B5B5</td>
  </tr>

  <tr>
    <td align="right">grey71</td>
    <td align="center" style="background-color: rgb(181, 181, 181)">grey71</td>
    <td align="left">rgb(181, 181, 181)</td>
    <td align="left">#B5B5B5</td>
  </tr>

  <tr>
    <td align="right">gray70</td>
    <td align="center" style="background-color: rgb(179, 179, 179)">gray70</td>
    <td align="left">rgb(179, 179, 179)</td>
    <td align="left">#B3B3B3</td>
  </tr>

  <tr>
    <td align="right">grey70</td>
    <td align="center" style="background-color: rgb(179, 179, 179)">grey70</td>
    <td align="left">rgb(179, 179, 179)</td>
    <td align="left">#B3B3B3</td>
  </tr>

  <tr>
    <td align="right">gray69</td>
    <td align="center" style="background-color: rgb(176, 176, 176)">gray69</td>
    <td align="left">rgb(176, 176, 176)</td>
    <td align="left">#B0B0B0</td>
  </tr>

  <tr>
    <td align="right">grey69</td>
    <td align="center" style="background-color: rgb(176, 176, 176)">grey69</td>
    <td align="left">rgb(176, 176, 176)</td>
    <td align="left">#B0B0B0</td>
  </tr>

  <tr>
    <td align="right">gray68</td>
    <td align="center" style="background-color: rgb(173, 173, 173)">gray68</td>
    <td align="left">rgb(173, 173, 173)</td>
    <td align="left">#ADADAD</td>
  </tr>

  <tr>
    <td align="right">grey68</td>
    <td align="center" style="background-color: rgb(173, 173, 173)">grey68</td>
    <td align="left">rgb(173, 173, 173)</td>
    <td align="left">#ADADAD</td>
  </tr>

  <tr>
    <td align="right">gray67</td>
    <td align="center" style="background-color: rgb(171, 171, 171)">gray67</td>
    <td align="left">rgb(171, 171, 171)</td>
    <td align="left">#ABABAB</td>
  </tr>

  <tr>
    <td align="right">grey67</td>
    <td align="center" style="background-color: rgb(171, 171, 171)">grey67</td>
    <td align="left">rgb(171, 171, 171)</td>
    <td align="left">#ABABAB</td>
  </tr>

  <tr>
    <td align="right">DarkGray</td>
    <td align="center" style="background-color: rgb(169, 169, 169)">DarkGray</td>
    <td align="left">rgb(169, 169, 169)</td>
    <td align="left">#A9A9A9</td>
  </tr>

  <tr>
    <td align="right">DarkGrey</td>
    <td align="center" style="background-color: rgb(169, 169, 169)">DarkGrey</td>
    <td align="left">rgb(169, 169, 169)</td>
    <td align="left">#A9A9A9</td>
  </tr>

  <tr>
    <td align="right">gray66</td>
    <td align="center" style="background-color: rgb(168, 168, 168)">gray66</td>
    <td align="left">rgb(168, 168, 168)</td>
    <td align="left">#A8A8A8</td>
  </tr>

  <tr>
    <td align="right">grey66</td>
    <td align="center" style="background-color: rgb(168, 168, 168)">grey66</td>
    <td align="left">rgb(168, 168, 168)</td>
    <td align="left">#A8A8A8</td>
  </tr>

  <tr>
    <td align="right">gray65</td>
    <td align="center" style="background-color: rgb(166, 166, 166)">gray65</td>
    <td align="left">rgb(166, 166, 166)</td>
    <td align="left">#A6A6A6</td>
  </tr>

  <tr>
    <td align="right">grey65</td>
    <td align="center" style="background-color: rgb(166, 166, 166)">grey65</td>
    <td align="left">rgb(166, 166, 166)</td>
    <td align="left">#A6A6A6</td>
  </tr>

  <tr>
    <td align="right">gray64</td>
    <td align="center" style="background-color: rgb(163, 163, 163)">gray64</td>
    <td align="left">rgb(163, 163, 163)</td>
    <td align="left">#A3A3A3</td>
  </tr>

  <tr>
    <td align="right">grey64</td>
    <td align="center" style="background-color: rgb(163, 163, 163)">grey64</td>
    <td align="left">rgb(163, 163, 163)</td>
    <td align="left">#A3A3A3</td>
  </tr>

  <tr>
    <td align="right">gray63</td>
    <td align="center" style="background-color: rgb(161, 161, 161)">gray63</td>
    <td align="left">rgb(161, 161, 161)</td>
    <td align="left">#A1A1A1</td>
  </tr>

  <tr>
    <td align="right">grey63</td>
    <td align="center" style="background-color: rgb(161, 161, 161)">grey63</td>
    <td align="left">rgb(161, 161, 161)</td>
    <td align="left">#A1A1A1</td>
  </tr>

  <tr>
    <td align="right">gray62</td>
    <td align="center" style="background-color: rgb(158, 158, 158)">gray62</td>
    <td align="left">rgb(158, 158, 158)</td>
    <td align="left">#9E9E9E</td>
  </tr>

  <tr>
    <td align="right">grey62</td>
    <td align="center" style="background-color: rgb(158, 158, 158)">grey62</td>
    <td align="left">rgb(158, 158, 158)</td>
    <td align="left">#9E9E9E</td>
  </tr>

  <tr>
    <td align="right">gray61</td>
    <td align="center" style="background-color: rgb(156, 156, 156)">gray61</td>
    <td align="left">rgb(156, 156, 156)</td>
    <td align="left">#9C9C9C</td>
  </tr>

  <tr>
    <td align="right">grey61</td>
    <td align="center" style="background-color: rgb(156, 156, 156)">grey61</td>
    <td align="left">rgb(156, 156, 156)</td>
    <td align="left">#9C9C9C</td>
  </tr>

  <tr>
    <td align="right">gray60</td>
    <td align="center" style="background-color: rgb(153, 153, 153)">gray60</td>
    <td align="left">rgb(153, 153, 153)</td>
    <td align="left">#999999</td>
  </tr>

  <tr>
    <td align="right">grey60</td>
    <td align="center" style="background-color: rgb(153, 153, 153)">grey60</td>
    <td align="left">rgb(153, 153, 153)</td>
    <td align="left">#999999</td>
  </tr>

  <tr>
    <td align="right">gray59</td>
    <td align="center" style="background-color: rgb(150, 150, 150)">gray59</td>
    <td align="left">rgb(150, 150, 150)</td>
    <td align="left">#969696</td>
  </tr>

  <tr>
    <td align="right">grey59</td>
    <td align="center" style="background-color: rgb(150, 150, 150)">grey59</td>
    <td align="left">rgb(150, 150, 150)</td>
    <td align="left">#969696</td>
  </tr>

  <tr>
    <td align="right">gray58</td>
    <td align="center" style="background-color: rgb(148, 148, 148)">gray58</td>
    <td align="left">rgb(148, 148, 148)</td>
    <td align="left">#949494</td>
  </tr>

  <tr>
    <td align="right">grey58</td>
    <td align="center" style="background-color: rgb(148, 148, 148)">grey58</td>
    <td align="left">rgb(148, 148, 148)</td>
    <td align="left">#949494</td>
  </tr>

  <tr>
    <td align="right">gray57</td>
    <td align="center" style="background-color: rgb(145, 145, 145)">gray57</td>
    <td align="left">rgb(145, 145, 145)</td>
    <td align="left">#919191</td>
  </tr>

  <tr>
    <td align="right">grey57</td>
    <td align="center" style="background-color: rgb(145, 145, 145)">grey57</td>
    <td align="left">rgb(145, 145, 145)</td>
    <td align="left">#919191</td>
  </tr>

  <tr>
    <td align="right">gray56</td>
    <td align="center" style="background-color: rgb(143, 143, 143)">gray56</td>
    <td align="left">rgb(143, 143, 143)</td>
    <td align="left">#8F8F8F</td>
  </tr>

  <tr>
    <td align="right">grey56</td>
    <td align="center" style="background-color: rgb(143, 143, 143)">grey56</td>
    <td align="left">rgb(143, 143, 143)</td>
    <td align="left">#8F8F8F</td>
  </tr>

  <tr>
    <td align="right">gray55</td>
    <td align="center" style="background-color: rgb(140, 140, 140)">gray55</td>
    <td align="left">rgb(140, 140, 140)</td>
    <td align="left">#8C8C8C</td>
  </tr>

  <tr>
    <td align="right">grey55</td>
    <td align="center" style="background-color: rgb(140, 140, 140)">grey55</td>
    <td align="left">rgb(140, 140, 140)</td>
    <td align="left">#8C8C8C</td>
  </tr>

  <tr>
    <td align="right">gray54</td>
    <td align="center" style="background-color: rgb(138, 138, 138)">gray54</td>
    <td align="left">rgb(138, 138, 138)</td>
    <td align="left">#8A8A8A</td>
  </tr>

  <tr>
    <td align="right">grey54</td>
    <td align="center" style="background-color: rgb(138, 138, 138)">grey54</td>
    <td align="left">rgb(138, 138, 138)</td>
    <td align="left">#8A8A8A</td>
  </tr>

  <tr>
    <td align="right">gray53</td>
    <td align="center" style="background-color: rgb(135, 135, 135)">gray53</td>
    <td align="left">rgb(135, 135, 135)</td>
    <td align="left">#878787</td>
  </tr>

  <tr>
    <td align="right">grey53</td>
    <td align="center" style="background-color: rgb(135, 135, 135)">grey53</td>
    <td align="left">rgb(135, 135, 135)</td>
    <td align="left">#878787</td>
  </tr>

  <tr>
    <td align="right">gray52</td>
    <td align="center" style="background-color: rgb(133, 133, 133)">gray52</td>
    <td align="left">rgb(133, 133, 133)</td>
    <td align="left">#858585</td>
  </tr>

  <tr>
    <td align="right">grey52</td>
    <td align="center" style="background-color: rgb(133, 133, 133)">grey52</td>
    <td align="left">rgb(133, 133, 133)</td>
    <td align="left">#858585</td>
  </tr>

  <tr>
    <td align="right">gray51</td>
    <td align="center" style="background-color: rgb(130, 130, 130)">gray51</td>
    <td align="left">rgb(130, 130, 130)</td>
    <td align="left">#828282</td>
  </tr>

  <tr>
    <td align="right">grey51</td>
    <td align="center" style="background-color: rgb(130, 130, 130)">grey51</td>
    <td align="left">rgb(130, 130, 130)</td>
    <td align="left">#828282</td>
  </tr>

  <tr>
    <td align="right">fractal</td>
    <td align="center" style="background-color: rgb(128, 128, 128)">fractal</td>
    <td align="left">rgb(128, 128, 128)</td>
    <td align="left">#808080</td>
  </tr>

  <tr>
    <td align="right">gray50</td>
    <td align="center" style="background-color: rgb(127, 127, 127)">gray50</td>
    <td align="left">rgb(127, 127, 127)</td>
    <td align="left">#7F7F7F</td>
  </tr>

  <tr>
    <td align="right">grey50</td>
    <td align="center" style="background-color: rgb(127, 127, 127)">grey50</td>
    <td align="left">rgb(127, 127, 127)</td>
    <td align="left">#7F7F7F</td>
  </tr>

  <tr>
    <td align="right">gray</td>
    <td align="center" style="background-color: rgb(126, 126, 126)">gray</td>
    <td align="left">rgb(126, 126, 126)</td>
    <td align="left">#7E7E7E</td>
  </tr>

  <tr>
    <td align="right">gray49</td>
    <td align="center" style="background-color: rgb(125, 125, 125)">gray49</td>
    <td align="left">rgb(125, 125, 125)</td>
    <td align="left">#7D7D7D</td>
  </tr>

  <tr>
    <td align="right">grey49</td>
    <td align="center" style="background-color: rgb(125, 125, 125)">grey49</td>
    <td align="left">rgb(125, 125, 125)</td>
    <td align="left">#7D7D7D</td>
  </tr>

  <tr>
    <td align="right">gray48</td>
    <td align="center" style="background-color: rgb(122, 122, 122)">gray48</td>
    <td align="left">rgb(122, 122, 122)</td>
    <td align="left">#7A7A7A</td>
  </tr>

  <tr>
    <td align="right">grey48</td>
    <td align="center" style="background-color: rgb(122, 122, 122)">grey48</td>
    <td align="left">rgb(122, 122, 122)</td>
    <td align="left">#7A7A7A</td>
  </tr>

  <tr>
    <td align="right">gray47</td>
    <td align="center" style="background-color: rgb(120, 120, 120)">gray47</td>
    <td align="left">rgb(120, 120, 120)</td>
    <td align="left">#787878</td>
  </tr>

  <tr>
    <td align="right">grey47</td>
    <td align="center" style="background-color: rgb(120, 120, 120)">grey47</td>
    <td align="left">rgb(120, 120, 120)</td>
    <td align="left">#787878</td>
  </tr>

  <tr>
    <td align="right">gray46</td>
    <td align="center" style="background-color: rgb(117, 117, 117)">gray46</td>
    <td align="left">rgb(117, 117, 117)</td>
    <td align="left">#757575</td>
  </tr>

  <tr>
    <td align="right">grey46</td>
    <td align="center" style="background-color: rgb(117, 117, 117)">grey46</td>
    <td align="left">rgb(117, 117, 117)</td>
    <td align="left">#757575</td>
  </tr>

  <tr>
    <td align="right">gray45</td>
    <td align="center" style="background-color: rgb(115, 115, 115)">gray45</td>
    <td align="left">rgb(115, 115, 115)</td>
    <td align="left">#737373</td>
  </tr>

  <tr>
    <td align="right">grey45</td>
    <td align="center" style="background-color: rgb(115, 115, 115)">grey45</td>
    <td align="left">rgb(115, 115, 115)</td>
    <td align="left">#737373</td>
  </tr>

  <tr>
    <td align="right">gray44</td>
    <td align="center" style="background-color: rgb(112, 112, 112)">gray44</td>
    <td align="left">rgb(112, 112, 112)</td>
    <td align="left">#707070</td>
  </tr>

  <tr>
    <td align="right">grey44</td>
    <td align="center" style="background-color: rgb(112, 112, 112)">grey44</td>
    <td align="left">rgb(112, 112, 112)</td>
    <td align="left">#707070</td>
  </tr>

  <tr>
    <td align="right">gray43</td>
    <td align="center" style="background-color: rgb(110, 110, 110)">gray43</td>
    <td align="left">rgb(110, 110, 110)</td>
    <td align="left">#6E6E6E</td>
  </tr>

  <tr>
    <td align="right">grey43</td>
    <td align="center" style="background-color: rgb(110, 110, 110)">grey43</td>
    <td align="left">rgb(110, 110, 110)</td>
    <td align="left">#6E6E6E</td>
  </tr>

  <tr>
    <td align="right">gray42</td>
    <td align="center" style="background-color: rgb(107, 107, 107)">gray42</td>
    <td align="left">rgb(107, 107, 107)</td>
    <td align="left">#6B6B6B</td>
  </tr>

  <tr>
    <td align="right">grey42</td>
    <td align="center" style="background-color: rgb(107, 107, 107)">grey42</td>
    <td align="left">rgb(107, 107, 107)</td>
    <td align="left">#6B6B6B</td>
  </tr>

  <tr>
    <td align="right">DimGray</td>
    <td align="center" style="background-color: rgb(105, 105, 105)">DimGray</td>
    <td align="left">rgb(105, 105, 105)</td>
    <td align="left">#696969</td>
  </tr>

  <tr>
    <td align="right">DimGrey</td>
    <td align="center" style="background-color: rgb(105, 105, 105)">DimGrey</td>
    <td align="left">rgb(105, 105, 105)</td>
    <td align="left">#696969</td>
  </tr>

  <tr>
    <td align="right">gray41</td>
    <td align="center" style="background-color: rgb(105, 105, 105)">gray41</td>
    <td align="left">rgb(105, 105, 105)</td>
    <td align="left">#696969</td>
  </tr>

  <tr>
    <td align="right">grey41</td>
    <td align="center" style="background-color: rgb(105, 105, 105)">grey41</td>
    <td align="left">rgb(105, 105, 105)</td>
    <td align="left">#696969</td>
  </tr>

  <tr>
    <td align="right">gray40</td>
    <td align="center" style="background-color: rgb(102, 102, 102)">gray40</td>
    <td align="left">rgb(102, 102, 102)</td>
    <td align="left">#666666</td>
  </tr>

  <tr>
    <td align="right">grey40</td>
    <td align="center" style="background-color: rgb(102, 102, 102)">grey40</td>
    <td align="left">rgb(102, 102, 102)</td>
    <td align="left">#666666</td>
  </tr>

  <tr>
    <td align="right">gray39</td>
    <td align="center" style="background-color: rgb( 99, 99,  99)">gray39</td>
    <td align="left">rgb( 99, 99,  99)</td>
    <td align="left">#636363</td>
  </tr>

  <tr>
    <td align="right">grey39</td>
    <td align="center" style="background-color: rgb( 99, 99,  99)">grey39</td>
    <td align="left">rgb( 99, 99,  99)</td>
    <td align="left">#636363</td>
  </tr>

  <tr>
    <td align="right">gray38</td>
    <td align="center" style="background-color: rgb( 97, 97,  97)">gray38</td>
    <td align="left">rgb( 97, 97,  97)</td>
    <td align="left">#616161</td>
  </tr>

  <tr>
    <td align="right">grey38</td>
    <td align="center" style="background-color: rgb( 97, 97,  97)">grey38</td>
    <td align="left">rgb( 97, 97,  97)</td>
    <td align="left">#616161</td>
  </tr>

  <tr>
    <td align="right">gray37</td>
    <td align="center" style="background-color: rgb( 94, 94,  94)">gray37</td>
    <td align="left">rgb( 94, 94,  94)</td>
    <td align="left">#5E5E5E</td>
  </tr>

  <tr>
    <td align="right">grey37</td>
    <td align="center" style="background-color: rgb( 94, 94,  94)">grey37</td>
    <td align="left">rgb( 94, 94,  94)</td>
    <td align="left">#5E5E5E</td>
  </tr>

  <tr>
    <td align="right">gray36</td>
    <td align="center" style="background-color: rgb( 92, 92,  92)">gray36</td>
    <td align="left">rgb( 92, 92,  92)</td>
    <td align="left">#5C5C5C</td>
  </tr>

  <tr>
    <td align="right">grey36</td>
    <td align="center" style="background-color: rgb( 92, 92,  92)">grey36</td>
    <td align="left">rgb( 92, 92,  92)</td>
    <td align="left">#5C5C5C</td>
  </tr>

  <tr>
    <td align="right">gray35</td>
    <td align="center" style="background-color: rgb( 89, 89,  89)">gray35</td>
    <td align="left">rgb( 89, 89,  89)</td>
    <td align="left">#595959</td>
  </tr>

  <tr>
    <td align="right">grey35</td>
    <td align="center" style="background-color: rgb( 89, 89,  89)">grey35</td>
    <td align="left">rgb( 89, 89,  89)</td>
    <td align="left">#595959</td>
  </tr>

  <tr>
    <td align="right">gray34</td>
    <td align="center" style="background-color: rgb( 87, 87,  87)">gray34</td>
    <td align="left">rgb( 87, 87,  87)</td>
    <td align="left">#575757</td>
  </tr>

  <tr>
    <td align="right">grey34</td>
    <td align="center" style="background-color: rgb( 87, 87,  87)">grey34</td>
    <td align="left">rgb( 87, 87,  87)</td>
    <td align="left">#575757</td>
  </tr>

  <tr>
    <td align="right">gray33</td>
    <td align="center" style="background-color: rgb( 84, 84,  84)">gray33</td>
    <td align="left">rgb( 84, 84,  84)</td>
    <td align="left">#545454</td>
  </tr>

  <tr>
    <td align="right">grey33</td>
    <td align="center" style="background-color: rgb( 84, 84,  84)">grey33</td>
    <td align="left">rgb( 84, 84,  84)</td>
    <td align="left">#545454</td>
  </tr>

  <tr>
    <td align="right">gray32</td>
    <td align="center" style="background-color: rgb( 82, 82,  82)">gray32</td>
    <td align="left">rgb( 82, 82,  82)</td>
    <td align="left">#525252</td>
  </tr>

  <tr>
    <td align="right">grey32</td>
    <td align="center" style="background-color: rgb( 82, 82,  82)">grey32</td>
    <td align="left">rgb( 82, 82,  82)</td>
    <td align="left">#525252</td>
  </tr>

  <tr>
    <td align="right">gray31</td>
    <td align="center" style="background-color: rgb( 79, 79,  79)">gray31</td>
    <td align="left">rgb( 79, 79,  79)</td>
    <td align="left">#4F4F4F</td>
  </tr>

  <tr>
    <td align="right">grey31</td>
    <td align="center" style="background-color: rgb( 79, 79,  79)">grey31</td>
    <td align="left">rgb( 79, 79,  79)</td>
    <td align="left">#4F4F4F</td>
  </tr>

  <tr>
    <td align="right">gray30</td>
    <td align="center" style="background-color: rgb( 77, 77,  77)">gray30</td>
    <td align="left">rgb( 77, 77,  77)</td>
    <td align="left">#4D4D4D</td>
  </tr>

  <tr>
    <td align="right">grey30</td>
    <td align="center" style="background-color: rgb( 77, 77,  77)">grey30</td>
    <td align="left">rgb( 77, 77,  77)</td>
    <td align="left">#4D4D4D</td>
  </tr>

  <tr>
    <td align="right">gray29</td>
    <td align="center" style="background-color: rgb( 74, 74,  74)">gray29</td>
    <td align="left">rgb( 74, 74,  74)</td>
    <td align="left">#4A4A4A</td>
  </tr>

  <tr>
    <td align="right">grey29</td>
    <td align="center" style="background-color: rgb( 74, 74,  74)">grey29</td>
    <td align="left">rgb( 74, 74,  74)</td>
    <td align="left">#4A4A4A</td>
  </tr>

  <tr>
    <td align="right">gray28</td>
    <td align="center" style="background-color: rgb( 71, 71,  71)">gray28</td>
    <td align="left">rgb( 71, 71,  71)</td>
    <td align="left">#474747</td>
  </tr>

  <tr>
    <td align="right">grey28</td>
    <td align="center" style="background-color: rgb( 71, 71,  71)">grey28</td>
    <td align="left">rgb( 71, 71,  71)</td>
    <td align="left">#474747</td>
  </tr>

  <tr>
    <td align="right">gray27</td>
    <td align="center" style="background-color: rgb( 69, 69,  69)">gray27</td>
    <td align="left">rgb( 69, 69,  69)</td>
    <td align="left">#454545</td>
  </tr>

  <tr>
    <td align="right">grey27</td>
    <td align="center" style="background-color: rgb( 69, 69,  69)">grey27</td>
    <td align="left">rgb( 69, 69,  69)</td>
    <td align="left">#454545</td>
  </tr>

  <tr>
    <td align="right">gray26</td>
    <td align="center" style="background-color: rgb( 66, 66,  66)">gray26</td>
    <td align="left">rgb( 66, 66,  66)</td>
    <td align="left">#424242</td>
  </tr>

  <tr>
    <td align="right">grey26</td>
    <td align="center" style="background-color: rgb( 66, 66,  66)">grey26</td>
    <td align="left">rgb( 66, 66,  66)</td>
    <td align="left">#424242</td>
  </tr>

  <tr>
    <td align="right">gray25</td>
    <td align="center" style="background-color: rgb( 64, 64,  64)">gray25</td>
    <td align="left">rgb( 64, 64,  64)</td>
    <td align="left">#404040</td>
  </tr>

  <tr>
    <td align="right">grey25</td>
    <td align="center" style="background-color: rgb( 64, 64,  64)">grey25</td>
    <td align="left">rgb( 64, 64,  64)</td>
    <td align="left">#404040</td>
  </tr>

  <tr>
    <td align="right">gray24</td>
    <td align="center" style="background-color: rgb( 61, 61,  61)">gray24</td>
    <td align="left">rgb( 61, 61,  61)</td>
    <td align="left">#3D3D3D</td>
  </tr>

  <tr>
    <td align="right">grey24</td>
    <td align="center" style="background-color: rgb( 61, 61,  61)">grey24</td>
    <td align="left">rgb( 61, 61,  61)</td>
    <td align="left">#3D3D3D</td>
  </tr>

  <tr>
    <td align="right">gray23</td>
    <td align="center" style="background-color: rgb( 59, 59,  59)">gray23</td>
    <td align="left">rgb( 59, 59,  59)</td>
    <td align="left">#3B3B3B</td>
  </tr>

  <tr>
    <td align="right">grey23</td>
    <td align="center" style="background-color: rgb( 59, 59,  59)">grey23</td>
    <td align="left">rgb( 59, 59,  59)</td>
    <td align="left">#3B3B3B</td>
  </tr>

  <tr>
    <td align="right">gray22</td>
    <td align="center" style="background-color: rgb( 56, 56,  56)">gray22</td>
    <td align="left">rgb( 56, 56,  56)</td>
    <td align="left">#383838</td>
  </tr>

  <tr>
    <td align="right">grey22</td>
    <td align="center" style="background-color: rgb( 56, 56,  56)">grey22</td>
    <td align="left">rgb( 56, 56,  56)</td>
    <td align="left">#383838</td>
  </tr>

  <tr>
    <td align="right">gray21</td>
    <td align="center" style="background-color: rgb( 54, 54,  54)">gray21</td>
    <td align="left">rgb( 54, 54,  54)</td>
    <td align="left">#363636</td>
  </tr>

  <tr>
    <td align="right">grey21</td>
    <td align="center" style="background-color: rgb( 54, 54,  54)">grey21</td>
    <td align="left">rgb( 54, 54,  54)</td>
    <td align="left">#363636</td>
  </tr>

  <tr>
    <td align="right">gray20</td>
    <td align="center" style="background-color: rgb( 51, 51,  51)">gray20</td>
    <td align="left">rgb( 51, 51,  51)</td>
    <td align="left">#333333</td>
  </tr>

  <tr>
    <td align="right">grey20</td>
    <td align="center" style="background-color: rgb( 51, 51,  51)">grey20</td>
    <td align="left">rgb( 51, 51,  51)</td>
    <td align="left">#333333</td>
  </tr>

  <tr>
    <td align="right">gray19</td>
    <td align="center" style="background-color: rgb( 48, 48,  48)">gray19</td>
    <td align="left">rgb( 48, 48,  48)</td>
    <td align="left">#303030</td>
  </tr>

  <tr>
    <td align="right">grey19</td>
    <td align="center" style="background-color: rgb( 48, 48,  48)">grey19</td>
    <td align="left">rgb( 48, 48,  48)</td>
    <td align="left">#303030</td>
  </tr>

  <tr>
    <td align="right">gray18</td>
    <td align="center" style="background-color: rgb( 46, 46,  46)">gray18</td>
    <td align="left">rgb( 46, 46,  46)</td>
    <td align="left">#2E2E2E</td>
  </tr>

  <tr>
    <td align="right">grey18</td>
    <td align="center" style="background-color: rgb( 46, 46,  46)">grey18</td>
    <td align="left">rgb( 46, 46,  46)</td>
    <td align="left">#2E2E2E</td>
  </tr>

  <tr>
    <td align="right">gray17</td>
    <td align="center" style="background-color: rgb( 43, 43,  43)">gray17</td>
    <td align="left">rgb( 43, 43,  43)</td>
    <td align="left">#2B2B2B</td>
  </tr>

  <tr>
    <td align="right">grey17</td>
    <td align="center" style="background-color: rgb( 43, 43,  43)">grey17</td>
    <td align="left">rgb( 43, 43,  43)</td>
    <td align="left">#2B2B2B</td>
  </tr>

  <tr>
    <td align="right">gray16</td>
    <td align="center" style="background-color: rgb( 41, 41,  41)">gray16</td>
    <td align="left">rgb( 41, 41,  41)</td>
    <td align="left">#292929</td>
  </tr>

  <tr>
    <td align="right">grey16</td>
    <td align="center" style="background-color: rgb( 41, 41,  41)">grey16</td>
    <td align="left">rgb( 41, 41,  41)</td>
    <td align="left">#292929</td>
  </tr>

  <tr>
    <td align="right">gray15</td>
    <td align="center" style="background-color: rgb( 38, 38,  38)">gray15</td>
    <td align="left">rgb( 38, 38,  38)</td>
    <td align="left">#262626</td>
  </tr>

  <tr>
    <td align="right">grey15</td>
    <td align="center" style="background-color: rgb( 38, 38,  38)">grey15</td>
    <td align="left">rgb( 38, 38,  38)</td>
    <td align="left">#262626</td>
  </tr>

  <tr>
    <td align="right">gray14</td>
    <td align="center" style="background-color: rgb( 36, 36,  36)">gray14</td>
    <td align="left">rgb( 36, 36,  36)</td>
    <td align="left">#242424</td>
  </tr>

  <tr>
    <td align="right">grey14</td>
    <td align="center" style="background-color: rgb( 36, 36,  36)">grey14</td>
    <td align="left">rgb( 36, 36,  36)</td>
    <td align="left">#242424</td>
  </tr>

  <tr>
    <td align="right">gray13</td>
    <td align="center" style="background-color: rgb( 33, 33,  33)">gray13</td>
    <td align="left">rgb( 33, 33,  33)</td>
    <td align="left">#212121</td>
  </tr>

  <tr>
    <td align="right">grey13</td>
    <td align="center" style="background-color: rgb( 33, 33,  33)">grey13</td>
    <td align="left">rgb( 33, 33,  33)</td>
    <td align="left">#212121</td>
  </tr>

  <tr>
    <td align="right">gray12</td>
    <td align="center" style="background-color: rgb( 31, 31,  31)">gray12</td>
    <td align="left">rgb( 31, 31,  31)</td>
    <td align="left">#1F1F1F</td>
  </tr>

  <tr>
    <td align="right">grey12</td>
    <td align="center" style="background-color: rgb( 31, 31,  31)">grey12</td>
    <td align="left">rgb( 31, 31,  31)</td>
    <td align="left">#1F1F1F</td>
  </tr>

  <tr>
    <td align="right">gray11</td>
    <td align="center" style="background-color: rgb( 28, 28,  28)">gray11</td>
    <td align="left">rgb( 28, 28,  28)</td>
    <td align="left">#1C1C1C</td>
  </tr>

  <tr>
    <td align="right">grey11</td>
    <td align="center" style="background-color: rgb( 28, 28,  28)">grey11</td>
    <td align="left">rgb( 28, 28,  28)</td>
    <td align="left">#1C1C1C</td>
  </tr>

  <tr>
    <td align="right">gray10</td>
    <td align="center" style="background-color: rgb( 26, 26,  26)">gray10</td>
    <td align="left">rgb( 26, 26,  26)</td>
    <td align="left">#1A1A1A</td>
  </tr>

  <tr>
    <td align="right">grey10</td>
    <td align="center" style="background-color: rgb( 26, 26,  26)">grey10</td>
    <td align="left">rgb( 26, 26,  26)</td>
    <td align="left">#1A1A1A</td>
  </tr>

  <tr>
    <td align="right">gray9</td>
    <td align="center" style="background-color: rgb( 23, 23,  23)">gray9</td>
    <td align="left">rgb( 23, 23,  23)</td>
    <td align="left">#171717</td>
  </tr>

  <tr>
    <td align="right">grey9</td>
    <td align="center" style="background-color: rgb( 23, 23,  23)">grey9</td>
    <td align="left">rgb( 23, 23,  23)</td>
    <td align="left">#171717</td>
  </tr>

  <tr>
    <td align="right">gray8</td>
    <td align="center" style="background-color: rgb( 20, 20,  20)">gray8</td>
    <td align="left">rgb( 20, 20,  20)</td>
    <td align="left">#141414</td>
  </tr>

  <tr>
    <td align="right">grey8</td>
    <td align="center" style="background-color: rgb( 20, 20,  20)">grey8</td>
    <td align="left">rgb( 20, 20,  20)</td>
    <td align="left">#141414</td>
  </tr>

  <tr>
    <td align="right">gray7</td>
    <td align="center" style="background-color: rgb( 18, 18,  18)">gray7</td>
    <td align="left">rgb( 18, 18,  18)</td>
    <td align="left">#121212</td>
  </tr>

  <tr>
    <td align="right">grey7</td>
    <td align="center" style="background-color: rgb( 18, 18,  18)">grey7</td>
    <td align="left">rgb( 18, 18,  18)</td>
    <td align="left">#121212</td>
  </tr>

  <tr>
    <td align="right">gray6</td>
    <td align="center" style="background-color: rgb( 15, 15,  15)">gray6</td>
    <td align="left">rgb( 15, 15,  15)</td>
    <td align="left">#0F0F0F</td>
  </tr>

  <tr>
    <td align="right">grey6</td>
    <td align="center" style="background-color: rgb( 15, 15,  15)">grey6</td>
    <td align="left">rgb( 15, 15,  15)</td>
    <td align="left">#0F0F0F</td>
  </tr>

  <tr>
    <td align="right">gray5</td>
    <td align="center" style="background-color: rgb( 13, 13,  13)">gray5</td>
    <td align="left">rgb( 13, 13,  13)</td>
    <td align="left">#0D0D0D</td>
  </tr>

  <tr>
    <td align="right">grey5</td>
    <td align="center" style="background-color: rgb( 13, 13,  13)">grey5</td>
    <td align="left">rgb( 13, 13,  13)</td>
    <td align="left">#0D0D0D</td>
  </tr>

  <tr>
    <td align="right">gray4</td>
    <td align="center" style="background-color: rgb( 10, 10,  10)">gray4</td>
    <td align="left">rgb( 10, 10,  10)</td>
    <td align="left">#0A0A0A</td>
  </tr>

  <tr>
    <td align="right">grey4</td>
    <td align="center" style="background-color: rgb( 10, 10,  10)">grey4</td>
    <td align="left">rgb( 10, 10,  10)</td>
    <td align="left">#0A0A0A</td>
  </tr>

  <tr>
    <td align="right">gray3</td>
    <td align="center" style="background-color: rgb(  8,  8,   8)">gray3</td>
    <td align="left">rgb(  8,  8,   8)</td>
    <td align="left">#080808</td>
  </tr>

  <tr>
    <td align="right">grey3</td>
    <td align="center" style="background-color: rgb(  8,  8,   8)">grey3</td>
    <td align="left">rgb(  8,  8,   8)</td>
    <td align="left">#080808</td>
  </tr>

  <tr>
    <td align="right">gray2</td>
    <td align="center" style="background-color: rgb(  5,  5,   5)">gray2</td>
    <td align="left">rgb(  5,  5,   5)</td>
    <td align="left">#050505</td>
  </tr>

  <tr>
    <td align="right">grey2</td>
    <td align="center" style="background-color: rgb(  5,  5,   5)">grey2</td>
    <td align="left">rgb(  5,  5,   5)</td>
    <td align="left">#050505</td>
  </tr>

  <tr>
    <td align="right">gray1</td>
    <td align="center" style="background-color: rgb(  3,  3,   3)">gray1</td>
    <td align="left">rgb(  3,  3,   3)</td>
    <td align="left">#030303</td>
  </tr>

  <tr>
    <td align="right">grey1</td>
    <td align="center" style="background-color: rgb(  3,  3,   3)">grey1</td>
    <td align="left">rgb(  3,  3,   3)</td>
    <td align="left">#030303</td>
  </tr>

  <tr>
    <td align="right">black</td>
    <td align="center" style="background-color: rgb(  0,  0,   0)">black</td>
    <td align="left">rgb(  0,  0,   0)</td>
    <td align="left">#000000</td>
  </tr>

  <tr>
    <td align="right">gray0</td>
    <td align="center" style="background-color: rgb(  0,  0,   0)">gray0</td>
    <td align="left">rgb(  0,  0,   0)</td>
    <td align="left">#000000</td>
  </tr>

  <tr>
    <td align="right">grey0</td>
    <td align="center" style="background-color: rgb(  0,  0,   0)">grey0</td>
    <td align="left">rgb(  0,  0,   0)</td>
    <td align="left">#000000</td>
  </tr>

  <tr>
    <td align="right">opaque</td>
    <td align="center" style="background-color: rgb(  0,  0,   0)">opaque</td>
    <td align="left">rgb(  0,  0,   0)</td>
    <td align="left">#000000</td>
  </tr>

  <tr>
    <td align="right">none</td>
    <td align="center" style="background-color: white">none</td>
    <td align="left">rgba(  0,  0,   0,   0.0)</td>
    <td align="left">#00000000</td>
  </tr>

  <tr>
    <td align="right">transparent</td>
    <td align="center" style="background-color: white">transparent</td>
    <td align="left">rgba(  0,  0,   0,   0.0)</td>
    <td align="left">#00000000</td>
  </tr>

  </tbody>
</table>
</div>

</div>
