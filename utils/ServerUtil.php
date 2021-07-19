<?php

namespace app\Utils;

class ServerUtil
{
    // for below php 8.0
    static function str_starts_with ( $haystack, $needle ): bool
    {
        return strpos( $haystack , $needle ) === 0;
    }
    public static function getDocumentRoot(): string
    {
        return $_SERVER['DOCUMENT_ROOT'];
    }

    public static function getAbsolutePath($path): string
    {
        if (!empty($path) && !self::str_starts_with($path, "/")) {
            $path = "/" . $path;
        }
        if (PHP_OS_FAMILY == "Windows") {
            $path = str_replace("/", "\\", $path);
        } else {
            $path = str_replace("\\", "/", $path);
        }
        return self::getDocumentRoot() . $path;
    }

    public static function getUrl($pathWithQuery): string
    {
        if (!empty($pathWithQuery) && !self::str_starts_with($pathWithQuery, "/")) {
            $pathWithQuery = "/" . $pathWithQuery;
        }
        return self::getHostWithProtocol() . $pathWithQuery;
    }

    public static function getHostUrl(): string
    {
        return self::getHostWithProtocol();
    }

    public static function getMainUrl(): string
    {
        return self::getUrl("/rb/index.php");
    }

    public static function getLoginUrl(): string
    {
        return self::getUrl("/rb/?mod=ssl_login");
    }

    public static function getSearchUrl(): string
    {
        return self::getUrl("/rb/?mod=_search");
    }

    private static function getHostWithProtocol(): string
    {
        $protocol = $_SERVER['HTTPS'] == "on" ? "https://" : "http://";
        return $protocol . $_SERVER['HTTP_HOST'];
    }

    public static function hasRemoteAddress(): bool
    {
        return $_SERVER['REMOTE_ADDR'] != "";
    }
}