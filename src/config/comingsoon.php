<?php
return [
  'start' => env('COMING_ACTIVE', false),
  'subscribe_url' => empty(env('COMING_SUBSCRIBE_URL', '')) ? null : env('COMING_SUBSCRIBE_URL'),
  'tokens' => empty(env('COMING_TOKENS', '')) ? [] : explode(',', env('COMING_TOKENS'))
];
