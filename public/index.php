<?php

  $socialMedia = [
    'bluesky' => 'https://bsky.app/profile/john.mu',
    'chess' => 'https://chess.com/member/YourBoyKandy',
    'discord' => 'https://discord.gg/rMzdpTU',
    'facebook' => 'https://facebook.com/YourBoyKandy',
    'github' => 'https://github.com/mullanaphy',
    'instagram' => 'https://instagram.com/YourBoyKandy',
    'linkedin' => 'https://linkedin.com/in/mullanaphy',
    'steam' => 'https://steamcommunity.com/id/YourBoyKandy',
    'threads' => 'https://www.threads.net/@mullanaphy',
    'twitch' => 'https://twitch.tv/YourBoyKandy',
    'twitter' => 'https://bsky.app/profile/john.mu',
  ];
  $keyOverrides = [
    'bluesky' => 'twitter',
    'threads' => 'twitter',
  ];

  $hostName = explode('.', $_SERVER['HTTP_HOST'])[0];
  if (isset($socialMedia[$hostName])) {
    $requestUri = str_replace('/', '', $_SERVER['REQUEST_URI']);
    if ($requestUri) {
      $requestUri = '/' . $requestUri;
    }
    header('Location: ' . $socialMedia[$hostName] . $requestUri);
    exit;
  }

  echo '<!DOCTYPE html>',
    '<html lang="en">',
    '<head>',
      '<meta charset="utf-8"/>',
      '<meta http-equiv="X-UA-Compatible" content="IE=edge"/>',
      '<meta name="viewport" content="width=device-width, initial-scale=1">',
      '<title>Around The Web</title>',
      '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"/>',
      '<script src="https://kit.fontawesome.com/686cbf714c.js" crossorigin="anonymous"></script>',
      '<style type="text/css">html, body { background: #073642; color: #93a1a1; } a { color: #b58900; text-decoration: none; } a:active, a:hover, a:focus { color: #cb4b16; text-decoration: none; } hr { border-top-color: #93a1a1; } i { width: 1.5em; } #social-media-links li { text-transform: capitalize; }</style>',
    '</head>',
    '<body>',
      '<div class="container">',
        '<h1>Around The Web</h1>',
        '<hr/>',
      '</div>',
      '<div class="container">',
        '<ul class="list-unstyled" id="social-media-links">',
          implode('', array_map(function($key, $value) use($keyOverrides) {
            $pack = 'chess' === $key
              ? 'fas'
              : 'fab';
            $icon = isset($keyOverrides[$key])
              ? $keyOverrides[$key]
              : $key;
            return '<li><a href="' . $value . '" rel="nofollow"><i class="' . $pack . ' fa-' . $icon . '"></i> ' . $key . '</a></li>';
          }, array_keys($socialMedia), array_values($socialMedia))),
        '</ul>',
        '<hr/>',
      '</div>',
      '<div class="container">',
        '<ul class="list-unstyled">',
          '<li><a href="https://john.mu"><i class="fas fa-home"></i> john.mu</a></li>',
          '<li><a href="https://github.john.mu/social.john.mu" rel="nofollow"><i class="fab fa-github-alt"></i> Source Code</a></li>',
        '</ul>',
      '</div>',
    '</body>',
  '</html>';
