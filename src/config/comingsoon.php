<?php
return [
  'start' => env('COMING_ACTIVE', false),
  'subscribe_url' => env('COMING_SUBSCRIBE_URL', null),
  'tokens' => explode(',', env('COMING_TOKENS', ''))
];
