## Synopsis

OAuth is a simple social media login library. It supports multiple providers for both 1.0 and 2.0 OAuth open standard for authorization.

## Code Example

Simple facebook login example:
```
<?php
use JakubPas\Oauth;

$oauth = new JakubPas\Oauth\Connector(
    'Facebook',
    'facebook application id ', 
    'facebook application secret', 
    'http://www.example.com/redirect/after/authorization',
    'email'
);
if (!isset($_POST[$oauth->getResponseType()])) {
    $oauth->authorize();
} else {
    $userProfile = $oauth->getUserProfile($_POST[$oauth->getResponseType()]);
    $data = json_decode($userProfile);
    // Login here....
}
```

## Motivation

The idea of this package is to create simple composer auto-loadeded library for OAuth authorization.

## Installation

composer require jakubpas/oauth

## API Reference

The API Reference are yet to be added.

## Tests

The test are yet to be added.

## Contributors

Jakub Pas 2015

## License

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
