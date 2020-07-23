<?php
  $socialMedia = [
    'chess' => 'https://chess.com/member/YourBoyKandy',
    'discord' => 'https://discord.gg/4hcTyDZ',
    'github' => 'https://github.com/mullanaphy',
    'instagram' => 'https://instagram.com/YourBoyKandy',
    'steam' => 'https://steamcommunity.com/id/YourBoyKandy',
    'twitch' => 'https://twitch.tv/YourBoyKandy',
    'twitter' => 'https://twitter.com/YourBoyKandy',
  ];

  $hostName = str_replace('.jo.mu', '', $_SERVER['HTTP_HOST']);
  if (isset($socialMedia[$hostName])) {
    header('Location: ' . $socialMedia[$hostName]);
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
      '<style type="text/css">li { text-transform: capitalize; }</style>',
    '</head>',
    '<body>',
      '<div class="container">',
        '<h1>Around The Web</h1>',
      '</div>',
      '<hr/>',
      '<div class="container">',
        '<ul class="list-unstyled">',
          implode('', array_map(function($key, $value) {
            return '<li><a href="' . $value . '" rel="nofollow"><i class="fas fa-external-link-alt"></i> ' . $key . '</a></li>';
          }, array_keys($socialMedia), array_values($socialMedia))),
        '</ul>',
      '</div>',
      '<hr/>',
      '<div class="container"><strong><a href="https://john.mu">john.mu</a></strong></div>',
    '</body>',
  '</html>';

