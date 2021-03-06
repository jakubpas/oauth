<?php
/**
 * @author Jakub Pas
 */

namespace JakubPas\Oauth;

/**
 * Class Providers
 * @author Jakub Pas
 * @package JakubPas\Oauth
 */
class Providers
{

    public static $providers = [
        'Facebook' => [
            'oauthVersion' => '2.0',
            'dialogUrl' => 'https://www.facebook.com/dialog/oauth?',
            'accessTokenUrl' => 'https://graph.facebook.com/oauth/access_token',
            'responseType' => 'code',
            'userProfileUrl' => 'https://graph.facebook.com/me/?',
            'header' => '',
        ],
        'Google' => [
            'oauthVersion' => '2.0',
            'dialogUrl' => 'https://accounts.google.com/o/oauth2/auth?',
            'accessTokenUrl' => 'https://accounts.google.com/o/oauth2/token',
            'responseType' => 'code',
            'userProfileUrl' => 'https://www.googleapis.com/oauth2/v1/userinfo?access_token=',
            'header' => 'Authorization: Bearer ',
        ],
        'Bitly' => [
            'oauthVersion' => '2.0',
            'dialogUrl' => 'https://bitly.com/oauth/authorize?',
            'accessTokenUrl' => 'https://api-ssl.bitly.com/oauth/access_token?',
            'responseType' => 'code',
            'scope' => '',
            'state' => '',
            'userProfileUrl' => 'https://api-ssl.bitly.com/v3/user/info?',
            'header' => '',
        ],
        'WordPress' => [
            'oauthVersion' => '2.0',
            'dialogUrl' => 'https://public-api.wordpress.com/oauth2/authorize?',
            'accessTokenUrl' => 'https://public-api.wordpress.com/oauth2/token?',
            'responseType' => 'code',
            'scope' => '',
            'state' => '',
            'userProfileUrl' => 'https://public-api.wordpress.com/rest/v1/me/?pretty=>1',
            'header' => 'Authorization: Bearer ',
        ],
        'Paypal' => [
            'oauthVersion' => '2.0',
            'dialogUrl' => 'https://www.paypal.com/webapps/auth/protocol/openidconnect/v1/authorize?',
            'accessTokenUrl' => 'https://www.paypal.com/webapps/auth/protocol/openidconnect/v1/tokenservice?',
            'responseType' => 'code',
            'state' => '',
            'userProfileUrl' => 'https://www.paypal.com/webapps/auth/protocol/openidconnect/v1/userinfo?schema=>openid&access_token=',
            'header' => '',
        ],
        'Microsoft' => [
            'oauthVersion' => '2.0',
            'dialogUrl' => 'https://login.live.com/oauth20_authorize.srf?',
            'accessTokenUrl' => 'https://login.live.com/oauth20_token.srf',
            'responseType' => 'code',
            'userProfileUrl' => 'https://apis.live.net/v5.0/me?access_token=',
            'header' => '',
        ],
        'Foursquare' => [
            'oauthVersion' => '2.0',
            'dialogUrl' => 'https://foursquare.com/oauth2/authorize?',
            'accessTokenUrl' => 'https://foursquare.com/oauth2/access_token',
            'responseType' => 'code',
            'userProfileUrl' => 'https://api.foursquare.com/v2/users/self?oauth_token=',
            'header' => '',
        ],
        'Box' => [
            'oauthVersion' => '2.0',
            'dialogUrl' => 'https://www.box.com/api/oauth2/authorize?',
            'accessTokenUrl' => 'https://www.box.com/api/oauth2/token?',
            'responseType' => 'code',
            'userProfileUrl' => 'https://api.box.com/2.0/users/me?oauth_token=',
            'header' => 'Authorization: Bearer ',
        ],
        'Yammer' => [
            'oauthVersion' => '2.0',
            'dialogUrl' => 'https://www.yammer.com/dialog/oauth?',
            'accessTokenUrl' => 'https://www.yammer.com/oauth2/access_token.json?',
            'responseType' => 'code',
            'userProfileUrl' => 'https://www.yammer.com/api/v1/users/current.json?access_token=',
            'header' => '',
        ],
        'Reddit' => [
            'oauthVersion' => '2.0',
            'dialogUrl' => 'https://ssl.reddit.com/api/v1/authorize?',
            'accessTokenUrl' => 'https://ssl.reddit.com/api/v1/access_token?',
            'responseType' => 'code',
            'userProfileUrl' => 'https://oauth.reddit.com/api/v1/me.json?access_token=',
            'header' => 'Authorization: Basic',
            'state' => 'SomeUnguessableValue',
        ],
        'Yandex' => [
            'oauthVersion' => '2.0',
            'dialogUrl' => 'https://oauth.yandex.com/authorize?display=>popup&',
            'accessTokenUrl' => 'https://oauth.yandex.com/token?',
            'responseType' => 'code',
            'userProfileUrl' => 'http://api-fotki.yandex.ru/api/me/?oauth_token=',
            'header' => '',
        ],
        'SoundCloud' => [
            'oauthVersion' => '2.0',
            'dialogUrl' => 'https://soundcloud.com/connect?',
            'accessTokenUrl' => 'https://api.soundcloud.com/oauth2/token?',
            'responseType' => 'code',
            'userProfileUrl' => 'https://api.soundcloud.com/me.json?oauth_token=',
            'scope' => 'non-expiring',
        ],
        'MeetUp' => [
            'oauthVersion' => '2.0',
            'dialogUrl' => 'https://secure.meetup.com/oauth2/authorize?',
            'accessTokenUrl' => 'https://secure.meetup.com/oauth2/access?',
            'responseType' => 'code',
            'userProfileUrl' => 'https://api.meetup.com/2/member/self?access_token=',
            'scope' => 'basic',
        ],
        'StockTwits' => [
            'oauthVersion' => '2.0',
            'dialogUrl' => 'https://api.stocktwits.com/api/2/oauth/authorize?',
            'accessTokenUrl' => 'https://api.stocktwits.com/api/2/oauth/token?',
            'responseType' => 'code',
            'userProfileUrl' => 'https://api.stocktwits.com/api/2/account/verify.json?access_token=',
            'scope' => 'read',
        ],
        'Github' => [
            'oauthVersion' => '2.0',
            'dialogUrl' => 'https://github.com/login/oauth/authorize?',
            'accessTokenUrl' => 'https://github.com/login/oauth/access_token?',
            'responseType' => 'code',
            'userProfileUrl' => 'https://api.github.com/user?access_token=',
            'scope' => 'read',
        ],
        'LinkedIn' => [
            'oauthVersion' => '2.0',
            'dialogUrl' => 'https://www.linkedin.com/uas/oauth2/authorization?',
            'accessTokenUrl' => 'https://www.linkedin.com/uas/oauth2/accessToken?',
            'responseType' => 'code',
            'userProfileUrl' => 'https://api.linkedin.com/v1/people/~?format=>json&oauth2_access_token=',
        ],
        'Flattr' => [
            'oauthVersion' => '2.0',
            'dialogUrl' => 'https://flattr.com/oauth/authorize?',
            'accessTokenUrl' => 'https://flattr.com/oauth/token?',
            'responseType' => 'code',
            'userProfileUrl' => 'https://api.flattr.com/rest/v2/user?access_token=',
            'scope' => 'flattr%20thing',
        ],
        'MixCloud' => [
            'oauthVersion' => '2.0',
            'dialogUrl' => 'https://www.mixcloud.com/oauth/authorize?',
            'accessTokenUrl' => 'https://www.mixcloud.com/oauth/access_token?',
            'responseType' => 'code',
            'userProfileUrl' => '',
        ],
        'Stripe' => [
            'oauthVersion' => '2.0',
            'dialogUrl' => 'https://connect.stripe.com/oauth/authorize?',
            'accessTokenUrl' => 'https://connect.stripe.com/oauth/token?',
            'responseType' => 'code',
            'scope' => 'read_write',
            'userProfileUrl' => '',
        ],
        'Wepay' => [
            'oauthVersion' => '2.0',
            'dialogUrl' => 'https://www.wepay.com/v2/oauth2/authorize?',
            'accessTokenUrl' => 'https://wepayapi.com/v2/oauth2/token?',
            'responseType' => 'code',
            'userProfileUrl' => '',
            'scope' => 'view_user',
        ],
        'Formstack' => [
            'oauthVersion' => '2.0',
            'dialogUrl' => 'https://www.formstack.com/api/v2/oauth2/authorize?',
            'accessTokenUrl' => 'https://www.formstack.com/api/v2/oauth2/token?',
            'responseType' => 'code',
            'userProfileUrl' => '',
        ],
        'MailChimp' => [
            'oauthVersion' => '2.0',
            'dialogUrl' => 'https://login.mailchimp.com/oauth2/authorize?',
            'accessTokenUrl' => 'https://login.mailchimp.com/oauth2/token?',
            'responseType' => 'code',
            'userProfileUrl' => '',
        ],
        'DailyMotion' => [
            'oauthVersion' => '2.0',
            'dialogUrl' => 'https://api.dailymotion.com/oauth/authorize?',
            'accessTokenUrl' => 'https://api.dailymotion.com/oauth/token?',
            'responseType' => 'code',
            'userProfileUrl' => 'https://api.dailymotion.com/me?access_token=',
            'scope' => 'read+write',
        ],
        'Snapr' => [
            'oauthVersion' => '2.0',
            'dialogUrl' => 'https://sna.pr/api/oauth/authorize?',
            'accessTokenUrl' => 'https://sna.pr/api/oauth/access_token?',
            'responseType' => 'code',
            'userProfileUrl' => '',
        ],
        'DeviantArt' => [
            'oauthVersion' => '2.0',
            'dialogUrl' => 'https://www.deviantart.com/oauth2/draft10/authorize?',
            'accessTokenUrl' => 'https://www.deviantart.com/oauth2/draft10/token?',
            'responseType' => 'code',
            'userProfileUrl' => 'https://www.deviantart.com/api/draft10/user/whoami?access_token=',
        ],
        'AngelList' => [
            'oauthVersion' => '2.0',
            'dialogUrl' => 'https://angel.co/api/oauth/authorize?',
            'accessTokenUrl' => 'https://angel.co/api/oauth/token?',
            'responseType' => 'code',
            'userProfileUrl' => 'https://api.angel.co/1/me?access_token=',
        ],
        'Imgur' => [
            'oauthVersion' => '2.0',
            'dialogUrl' => 'https://api.imgur.com/oauth2/authorize?',
            'accessTokenUrl' => 'https://api.imgur.com/oauth2/token?',
            'responseType' => 'code',
            'userProfileUrl' => '',
            'header' => 'Authorization: Bearer ',
        ]
    ];
}
