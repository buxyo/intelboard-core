<?php
class Lang {
    private static $lang = [];
    private static $locale = 'en';

    public static function load($locale = 'en') {
        $path = __DIR__ . "/../views/assets/lang/{$locale}.json";
        if (file_exists($path)) {
            self::$lang = json_decode(file_get_contents($path), true);
            self::$locale = $locale;
        }
    }

    public static function get($key) {
        return self::$lang[$key] ?? $key;
    }

    public static function locale() {
        return self::$locale;
    }
}
