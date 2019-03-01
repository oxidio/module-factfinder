<?php
/**
 * Copyright (C) oxidio. See LICENSE file for license details.
 */

namespace DI;

use FACTFinder\ {
    Adapter,
    Core,
    Core\Client,
    Core\Server,
    Util
};
use Oxidio\FF;

return [
    Util\LoggerInterface::class => create(Util\NullLogger::class),

    Core\ConfigurationInterface::class => function() {
        return new Core\ManualConfiguration(array_merge(FF\CONFIG, [
            FF\CONFIG\SERVERADDRESS => getenv('FF_SERVERADDRESS'),
            FF\CONFIG\CONTEXT       => getenv('FF_CONTEXT'),
            FF\CONFIG\CHANNEL       => getenv('FF_CHANNEL'),
            FF\CONFIG\USERNAME      => getenv('FF_USERNAME'),
            FF\CONFIG\PASSWORD      => getenv('FF_PASSWORD'),
        ]));
    },

    Core\AbstractEncodingConverter::class => function(Util\LoggerInterface $logger, Core\ConfigurationInterface $config) {
        if (extension_loaded('iconv')) {
            return new Core\IConvEncodingConverter(get_class($logger), $config);
        }
        if (function_exists('utf8_encode') && function_exists('utf8_decode')) {
            return new Core\Utf8EncodingConverter(get_class($logger), $config);
        }
        return null;
    },

    Util\CurlInterface::class => create(Util\Curl::class),

    Client\RequestParser::class => function(
        Util\LoggerInterface $logger,
        Core\ConfigurationInterface $config,
        Core\AbstractEncodingConverter $converter = null
    ) {
        return new Client\RequestParser(get_class($logger), $config, $converter);
    },

    Util\Parameters::class => factory(function(Client\RequestParser $parser) {
        return $parser->getRequestParameters();
    }),

    Server\RequestFactoryInterface::class => function(
        Util\LoggerInterface $logger,
        Core\ConfigurationInterface $config,
        Util\Parameters $params,
        Util\CurlInterface $curl
    ) {
        return new Server\MultiCurlRequestFactory(get_class($logger), $config, $params, $curl);
    },

    Server\Request::class => factory(function(Server\RequestFactoryInterface $factory) {
        return $factory->getRequest();
    }),

    Client\UrlBuilder::class => function(
        Util\LoggerInterface $logger,
        Core\ConfigurationInterface $config,
        Client\RequestParser $parser,
        Core\AbstractEncodingConverter $converter = null
    ) {
        return new Client\UrlBuilder(get_class($logger), $config, $parser, $converter);
    },

    Adapter\Suggest::class => function(
        Util\LoggerInterface $logger,
        Core\ConfigurationInterface $config,
        Server\Request $request,
        Client\UrlBuilder $builder,
        Core\AbstractEncodingConverter $converter = null
    ) {
        return new Adapter\Suggest(get_class($logger), $config, $request, $builder, $converter);
    },

    Adapter\Search::class => function(
        Util\LoggerInterface $logger,
        Core\ConfigurationInterface $config,
        Server\Request $request,
        Client\UrlBuilder $builder,
        Core\AbstractEncodingConverter $converter = null
    ) {
        return new Adapter\Search(get_class($logger), $config, $request, $builder, $converter);
    },
];
