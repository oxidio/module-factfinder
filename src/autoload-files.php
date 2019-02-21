<?php /** @noinspection SpellCheckingInspection */

namespace {
    call_user_func(function (...$files) {
        foreach ($files as $file) {
            if (file_exists($file)) {
                /** @noinspection PhpIncludeInspection */
                require_once $file;
            }
        }
    }, __DIR__ . '/../vendor/fact-finder/fact-finder-php-library/src/FACTFinder/Loader.php');
}

namespace Oxidio\FF\CONFIG {
    const SERVERMAPPINGS            = 'serverMappings';
    const IGNOREDSERVERPARAMETERS   = 'ignoredServerParameters';
    const WHITELISTSERVERPARAMETERS = 'whitelistServerParameters';
    const REQUIREDSERVERPARAMETERS  = 'requiredServerParameters';
    const CLIENTMAPPINGS            = 'clientMappings';
    const IGNOREDCLIENTPARAMETERS   = 'ignoredClientParameters';
    const WHITELISTCLIENTPARAMETERS = 'whitelistClientParameters';
    const REQUIREDCLIENTPARAMETERS  = 'requiredClientParameters';
    const DEBUG                     = 'debug';
    const REQUESTPROTOCOL           = 'requestProtocol';
    const SERVERADDRESS             = 'serverAddress';
    const PORT                      = 'port';
    const CONTEXT                   = 'context';
    const CHANNEL                   = 'channel';
    const LANGUAGE                  = 'language';
    const AUTHENTICATIONTYPE        = 'authenticationType';
    const USERNAME                  = 'userName';
    const PASSWORD                  = 'password';
    const AUTHENTICATIONPREFIX      = 'authenticationPrefix';
    const AUTHENTICATIONPOSTFIX     = 'authenticationPostfix';
    const DEFAULTCONNECTTIMEOUT     = 'defaultConnectTimeout';
    const DEFAULTTIMEOUT            = 'defaultTimeout';
    const SUGGESTCONNECTTIMEOUT     = 'suggestConnectTimeout';
    const SUGGESTTIMEOUT            = 'suggestTimeout';
    const TRACKINGCONNECTTIMEOUT    = 'trackingConnectTimeout';
    const TRACKINGTIMEOUT           = 'trackingTimeout';
    const IMPORTCONNECTTIMEOUT      = 'importConnectTimeout';
    const IMPORTTIMEOUT             = 'importTimeout';
    const PAGECONTENTENCODING       = 'pageContentEncoding';
    const CLIENTURLENCODING         = 'clientUrlEncoding';
}

namespace Oxidio\FF {
    const CONFIG = [
        CONFIG\SERVERMAPPINGS            => [],
        CONFIG\IGNOREDSERVERPARAMETERS   => [],
        CONFIG\WHITELISTSERVERPARAMETERS => [],
        CONFIG\REQUIREDSERVERPARAMETERS  => [],
        CONFIG\CLIENTMAPPINGS            => [],
        CONFIG\IGNOREDCLIENTPARAMETERS   => [],
        CONFIG\WHITELISTCLIENTPARAMETERS => [],
        CONFIG\REQUIREDCLIENTPARAMETERS  => [],
        CONFIG\DEBUG                     => false,
        CONFIG\REQUESTPROTOCOL           => 'https',
        CONFIG\SERVERADDRESS             => '',
        CONFIG\PORT                      => '',
        CONFIG\CONTEXT                   => '',
        CONFIG\CHANNEL                   => '',
        CONFIG\LANGUAGE                  => 'de',
        CONFIG\AUTHENTICATIONTYPE        => 'advanced',
        CONFIG\USERNAME                  => '',
        CONFIG\PASSWORD                  => '',
        CONFIG\AUTHENTICATIONPREFIX      => 'FACT-FINDER',
        CONFIG\AUTHENTICATIONPOSTFIX     => 'FACT-FINDER',
        CONFIG\DEFAULTCONNECTTIMEOUT     => '2',
        CONFIG\DEFAULTTIMEOUT            => '4',
        CONFIG\SUGGESTCONNECTTIMEOUT     => '2',
        CONFIG\SUGGESTTIMEOUT            => '1',
        CONFIG\TRACKINGCONNECTTIMEOUT    => '2',
        CONFIG\TRACKINGTIMEOUT           => '1',
        CONFIG\IMPORTCONNECTTIMEOUT      => '10',
        CONFIG\IMPORTTIMEOUT             => '360',
        CONFIG\PAGECONTENTENCODING       => 'UTF-8',
        CONFIG\CLIENTURLENCODING         => 'UTF-8',
    ];
}

