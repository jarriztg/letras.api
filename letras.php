<?php
$target = 'en';

function utf8_strrev($str){
    preg_match_all('/./us', $str, $ar);
    return join('', array_reverse($ar[0]));
}

function getlang($value, $array_p) {
    $langs = array(
        'es' => array(
            'format_not_found'           => 'formato no encontrado',
            'parameters_not_found'       => 'parámetros obligatorios no encontrados',
            'parameter_format_not_found' => 'parámetro \''.$array_p[2].'\' no encontrado',
            'parameter_text_not_found'   => 'parámetro \''.$array_p[1].'\' no encontrado'
        ),
        'en' => array(
            'format_not_found'           => 'format not found',
            'parameters_not_found'       => 'parameters required not found',
            'parameter_format_not_found' => 'parameter \''.$array_p[2].'\' not found',
            'parameter_text_not_found'   => 'parameter \''.$array_p[1].'\' not found'
        )
    );
    return $langs[strtolower($value)];
};


$parameters = array(
    'ln',
    'texto',
    'formato',
    'espacios'
);

$param_espacios = $_GET[$parameters[3]] === 'true'? true: false;

if (isset($_GET[$parameters[0]])) {
    $lang = getlang($_GET[$parameters[0]], $parameters);
    if (!$lang) {
        $api = array (
            'ok' => false,
            'resultado' => array(
                'error'         => 'lenguaje no disponible',
                'error_codigo'  => 6
            )
        );
        echo json_encode($api);
        return;
    }
} else {
    $lang = getlang($target, $parameters);
};

if (isset($_GET[$parameters[1]]) && isset($_GET[$parameters[2]])) {

    $formato = $_GET[$parameters[2]];

    $texto = $_GET[$parameters[1]];

    switch ($formato) {
        case 'egipcias':
        $rep = array(
            'a' => 'ન',
            'b' => 'Ъ',
            'c' => '૮',
            'd' => 'ԁ',
            'e' => '૯',
            'f' => 'Բ',
            'g' => 'ց',
            'h' => 'સ',
            'i' => 'і',
            'j' => 'ڙ',
            'k' => 'қ',
            'l' => 'Լ',
            'm' => 'ற',
            'n' => 'ה',
            'o' => 'ଇ',
            'p' => 'Ϸ',
            'q' => '૧',
            'r' => 'Я',
            's' => '૬',
            't' => 'Ҭ',
            'u' => 'μ',
            'v' => 'ν',
            'w' => 'ய',
            'x' => 'ϰ',
            'y' => 'ϓ',
            'z' => 'ｚ'
        );

        $texto = str_replace(
            array_keys($rep),
            array_values($rep),
            strtolower($texto)
        );

        $api = array (
            'ok' => true,
            'resultado' => array(
                    'texto'     => $texto,
                    'formato'   => $formato,
                    'longitud'  => strlen($texto)
            )
        );
        break;
        case 'tuenti':
        $rep = array(
            'a' => 'ａ',
            'A' => 'Ａ',
            'b' => 'ｂ',
            'B' => 'Ｂ',
            'c' => 'ｃ',
            'C' => 'Ｃ',
            'd' => 'ｄ',
            'D' => 'Ｄ',
            'e' => 'ｅ',
            'E' => 'Ｅ',
            'f' => 'ｆ',
            'F' => 'Ｆ',
            'g' => 'ｇ',
            'G' => 'Ｇ',
            'h' => 'ｈ',
            'H' => 'Ｈ',
            'i' => 'ｉ',
            'I' => 'Ｉ',
            'j' => 'ｊ',
            'J' => 'Ｊ',
            'k' => 'ｋ',
            'K' => 'Ｋ',
            'l' => 'ｌ',
            'L' => 'Ｌ',
            'm' => 'ｍ',
            'M' => 'Ｍ',
            'n' => 'ｎ',
            'N' => 'Ｎ',
            'o' => 'ｏ',
            'O' => 'Ｏ',
            'p' => 'ｐ',
            'P' => 'Ｐ',
            'q' => 'ｑ',
            'Q' => 'Ｑ',
            'r' => 'ｒ',
            'R' => 'Ｒ',
            's' => 'ｓ',
            'S' => 'Ｓ',
            't' => 'ｔ',
            'T' => 'Ｔ',
            'u' => 'ｕ',
            'U' => 'Ｕ',
            'v' => 'ｖ',
            'V' => 'Ｖ',
            'w' => 'ｗ',
            'W' => 'Ｗ',
            'x' => 'ｘ',
            'X' => 'Ｘ',
            'y' => 'ｙ',
            'Y' => 'Ｙ',
            'z' => 'ｚ',
            'Z' => 'Z'
        );

        $texto = str_replace(
            array_keys($rep),
            array_values($rep),
            $texto
        );

        $api = array (
            'ok' => true,
            'resultado' => array(
                'texto'     => $texto,
                'formato'   => $formato,
                'longitud'  => strlen($texto)
            )
        );
        break;
        case 'peques':
        $rep = array(
            'a' => 'ᵃ',
            'b' => 'ᵇ',
            'c' => 'ᶜ',
            'd' => 'ᵈ',
            'e' => 'ᵉ',
            'f' => 'ᶠ',
            'g' => 'ᵍ',
            'h' => 'ʰ',
            'i' => 'ᶥ',
            'j' => 'ʲ',
            'k' => 'ᵏ',
            'l' => 'ˡ',
            'm' => 'ᵐ',
            'n' => 'ᵑ',
            'o' => 'ᵒ',
            'p' => 'ᵖ',
            'q' => 'ᵠ',
            'r' => 'ʳ',
            's' => 'ˢ',
            't' => 'ᵗ',
            'u' => 'ᵘ',
            'v' => 'ᵛ',
            'w' => 'ʷ',
            'x' => 'ˣ',
            'y' => 'ʸ',
            'z' => 'ᶻ',
            'A' => 'ᴬ',
            'B' => 'ᴮ',
            'C' => 'C',
            'D' => 'ᵈ',
            'E' => 'ᵉ',
            'F' => 'ғ',
            'G' => 'ᴳ',
            'H' => 'ᴴ',
            'I' => 'ᴵ',
            'J' => 'ᴶ',
            'K' => 'ᴷ',
            'L' => 'ᴸ',
            'M' => 'ᴹ',
            'N' => 'ᴺ',
            'O' => 'ᴼ',
            'P' => 'ᴾ',
            'Q' => 'ᵠ',
            'R' => 'ᴿ',
            'S' => 'ˢ',
            'T' => 'ᵀ',
            'U' => 'ᵁ',
            'V' => 'ᵛ',
            'W' => 'ᵂ',
            'X' => 'ᵡ',
            'Y' => 'ᵞ',
            'Z' => 'ᶻ',
            '0' => '⁰',
            '1' => '¹',
            '2' => '²',
            '3' => '³',
            '4' => '⁴',
            '5' => '⁵',
            '6' => '⁶',
            '7' => '⁷',
            '8' => '⁸',
            '9' => '₉',
            '+' => '₊',
            '-' => '₋',
            '=' => '₌',
            '//' => 'ϟ'
        );

        $texto = str_replace(
            array_keys($rep),
            array_values($rep),
            $texto
        );

        $api = array (
            'ok' => true,
            'resultado' => array(
                'texto'     => $texto,
                'formato'   => $formato,
                'longitud'  => strlen($texto)
            )
        );
        break;
        case 'cuadradas':
        $rep = array(
            'a' => '🅰',
            'b' => '🅱',
            'c' => '🅲',
            'd' => '🅳',
            'e' => '🅴',
            'f' => '🅵',
            'g' => '🅶',
            'h' => '🅷',
            'i' => '🅸',
            'j' => '🅹',
            'k' => '🅺',
            'l' => '🅻',
            'm' => '🅼',
            'n' => '🅽',
            'o' => '🅾',
            'p' => '🅿',
            'q' => '🆀',
            'r' => '🆁',
            's' => '🆂',
            't' => '🆃',
            'u' => '🆄',
            'v' => '🆅',
            'w' => '🆆',
            'x' => '🆇',
            'y' => '🆈',
            'z' => '🆉'
        );

        $texto = str_replace(
            array_keys($rep),
            array_values($rep),
            strtolower($texto)
        );

        $api = array (
            'ok' => true,
            'resultado' => array(
                'texto'     => $texto,
                'formato'   => $formato,
                'longitud'  => strlen($texto)
            )
        );
        break;
        case 'azules':
        $rep = array(
            'a' => '🇦',
            'b' => '🇧',
            'c' => '🇨',
            'd' => '🇩',
            'e' => '🇪',
            'f' => '🇫',
            'g' => '🇬',
            'h' => '🇭',
            'i' => '🇮',
            'j' => '🇯',
            'k' => '🇰',
            'l' => '🇱',
            'm' => '🇲',
            'n' => '🇳',
            'o' => '🇴',
            'p' => '🇵',
            'q' => '🇶',
            'r' => '🇷',
            's' => '🇸',
            't' => '🇹',
            'u' => '🇺',
            'v' => '🇻',
            'w' => '🇼',
            'x' => '🇽',
            'y' => '🇾',
            'z' => '🇿'
        );

        $texto = str_replace(
            array_keys($rep),
            array_values($rep),
            strtolower($texto)
        );

        $api = array (
            'ok' => true,
            'resultado' => array(
                'texto'     => $texto,
                'formato'   => $formato,
                'longitud'  => strlen($texto)
            )
        );
        break;
        case 'reflejo':
        $rep = array(
            'a' => 'ɐ',
            'b' => 'q',
            'c' => 'ɔ',
            'd' => 'p',
            'e' => 'ǝ',
            'f' => 'ɟ',
            'g' => 'ƃ',
            'h' => 'ɥ',
            'i' => 'ı',
            'j' => 'ɾ',
            'k' => 'ʞ',
            'l' => 'l',
            'm' => 'ɯ',
            'n' => 'u',
            'o' => 'o',
            'p' => 'd',
            'q' => 'b',
            'r' => 'ɹ',
            's' => 's',
            't' => 'ʇ',
            'u' => 'n',
            'v' => 'ʌ',
            'w' => 'ʍ',
            'x' => 'x',
            'y' => 'ʎ',
            'z' => 'z'
        );

        $texto = str_replace(
            array_keys($rep),
            array_values($rep),
            strtolower($texto)
        );

        $api = array (
            'ok' => true,
            'resultado' => array(
                'texto'     => utf8_strrev($texto),
                'formato'   => $formato,
                'longitud'  => strlen(utf8_strrev($texto))
            )
        );
        break;
        case 'dobles':
        $rep = array(
            'a' => '𝕒',
            'A' => '𝔸',
            'b' => '𝕓',
            'B' => '𝔹',
            'c' => '𝕔',
            'C' => 'ℂ',
            'd' => '𝕕',
            'D' => '𝔻',
            'e' => '𝕖',
            'E' => '𝔼',
            'f' => '𝕗',
            'F' => '𝔽',
            'g' => '𝕘',
            'G' => '𝔾',
            'h' => '𝕙',
            'H' => 'ℍ',
            'i' => '𝕚',
            'I' => '𝕀',
            'j' => '𝕛',
            'J' => '𝕁',
            'k' => '𝕜',
            'K' => '𝕂',
            'l' => '𝕝',
            'L' => '𝕃',
            'm' => '𝕞',
            'M' => '𝕄',
            'n' => '𝕟',
            'N' => 'ℕ',
            'o' => '𝕠',
            'O' => '𝕆',
            'p' => '𝕡',
            'P' => 'ℙ',
            'q' => '𝕢',
            'Q' => 'ℚ',
            'r' => '𝕣',
            'R' => 'ℝ',
            's' => '𝕤',
            'S' => '𝕊',
            't' => '𝕥',
            'T' => '𝕋',
            'u' => '𝕦',
            'U' => '𝕌',
            'v' => '𝕧',
            'V' => '𝕍',
            'w' => '𝕨',
            'W' => '𝕎',
            'x' => '𝕩',
            'X' => '𝕏',
            'y' => '𝕪',
            'Y' => '𝕐',
            'z' => '𝕫',
            'Z' => 'ℤ',
        );

        $texto = str_replace(
            array_keys($rep),
            array_values($rep),
            $texto
        );

        $api = array (
            'ok' => true,
            'resultado' => array(
                'texto'     => $texto,
                'formato'   => $formato,
                'longitud'  => strlen($texto)
            )
        );
        break;
        case 'invertidas':
        $api = array (
            'ok' => true,
            'resultado' => array(
                'texto'     => utf8_strrev($texto),
                'formato'   => $formato,
                'longitud'  => strlen(utf8_strrev($texto))
            )
        );
        break;
        case 'tachadas':
        $caracteres = preg_split('//u', $texto, -1, PREG_SPLIT_NO_EMPTY);
        $finalstr = "";
        for ($i=0; $i<sizeof($caracteres); $i++) {
            $finalstr .= $caracteres[$i];
            if (strcmp($caracteres[$i], " ")) {
                $finalstr .= trim(" ̶");
            } elseif ($param_espacios) {
                $finalstr .= trim(" ̶");
            };
        };
        $api = array (
            'ok' => true,
            'resultado' => array(
                'texto'     => $finalstr,
                'formato'   => $formato,
                'longitud'  => strlen($finalstr)
            )
        );
        break;
        case 'subarriba':
        $caracteres = preg_split('//u', $texto, -1, PREG_SPLIT_NO_EMPTY);
        $finalstr = "";
        for ($i=0; $i<sizeof($caracteres); $i++) {
            $finalstr .= $caracteres[$i];
            if (strcmp($caracteres[$i], " ")) {
                $finalstr .= trim(" ̅ ");
            } elseif ($param_espacios) {
                $finalstr .= trim(" ̅ ");
            };
        };
        $api = array (
            'ok' => true,
            'resultado' => array(
                'texto'     => $finalstr,
                'formato'   => $formato,
                'longitud'  => strlen($finalstr)
            )
        );
        break;
        case 'subrayadas':
        $caracteres = preg_split('//u', $texto, -1, PREG_SPLIT_NO_EMPTY);
        $finalstr = "";
        for ($i=0; $i<sizeof($caracteres); $i++) {
            $finalstr .= $caracteres[$i];
            if (strcmp($caracteres[$i], " ")) {
                $finalstr .= trim(" ̲");
            } elseif ($param_espacios) {
                $finalstr .= trim(" ̲");
            };
        };
        $api = array (
            'ok' => true,
            'resultado' => array(
                'texto'     => $finalstr,
                'formato'   => $formato,
                'longitud'  => strlen($finalstr)
            )
        );
        break;
        case 'cursivas':
        $rep = array(
            'a' => '𝓪',
            'A' => '𝓐',
            'b' => '𝓫',
            'B' => 'ℬ',
            'c' => '𝓬',
            'C' => '𝓒',
            'd' => '𝓭',
            'D' => '𝓓',
            'e' => '𝒆',
            'E' => '𝓔',
            'f' => '𝒇',
            'F' => 'ℱ',
            'g' => '𝓰',
            'G' => '𝓖',
            'h' => '𝓱',
            'H' => 'ℋ',
            'i' => '𝓲',
            'I' => '𝓘',
            'j' => '𝓳',
            'J' => '𝓙',
            'k' => '𝓴',
            'K' => '𝓚',
            'l' => '𝓵',
            'L' => 'ℒ',
            'm' => '𝓶',
            'M' => 'ℳ',
            'n' => '𝓷',
            'N' => '𝓝',
            'o' => '𝓸',
            'O' => '𝓞',
            'p' => '𝓹',
            'P' => '𝓟',
            'q' => '𝓺',
            'Q' => '𝓠',
            'r' => '𝓻',
            'R' => 'ℛ',
            's' => '𝓼',
            'S' => '𝓢',
            't' => '𝓽',
            'T' => '𝓣',
            'u' => '𝓾',
            'U' => '𝓤',
            'v' => '𝓿',
            'V' => '𝓥',
            'w' => '𝔀',
            'W' => '𝓦',
            'x' => '𝔁',
            'X' => '𝓧',
            'y' => '𝔂',
            'Y' => '𝓨',
            'z' => '𝔃',
            'Z' => '𝓩',
        );

        $texto = str_replace(
            array_keys($rep),
            array_values($rep),
            $texto
        );

        $api = array (
            'ok' => true,
            'resultado' => array(
                'texto'     => $texto,
                'formato'   => $formato,
                'longitud'  => strlen($texto)
            )
        );

        break;
        case 'circulos':
        $rep = array(
            'a' => 'ⓐ',
            'b' => 'ⓑ',
            'c' => 'ⓒ',
            'd' => 'ⓓ',
            'e' => 'ⓔ',
            'f' => 'ⓕ',
            'g' => 'ⓖ',
            'h' => 'ⓗ',
            'i' => 'ⓘ',
            'j' => 'ⓙ',
            'k' => 'ⓚ',
            'l' => 'ⓛ',
            'm' => 'ⓜ',
            'n' => 'ⓝ',
            'o' => 'ⓞ',
            'p' => 'ⓟ',
            'q' => 'ⓠ',
            'r' => 'ⓡ',
            's' => 'ⓢ',
            't' => 'ⓣ',
            'u' => 'ⓤ',
            'v' => 'ⓥ',
            'w' => 'ⓦ',
            'x' => 'ⓧ',
            'y' => 'ⓨ',
            'z' => 'ⓩ'
        );

        $texto = str_replace(
            array_keys($rep),
            array_values($rep),
            strtolower($texto)
        );

        $api = array (
            'ok' => true,
            'resultado' => array(
                'texto'     => $texto,
                'formato'   => $formato,
                'longitud'  => strlen($texto)
            )
        );

        break;
        case 'chinas':
        $rep = array(
            'a' => 'ﾑ',
            'b' => '乃',
            'c' => 'ζ',
            'd' => 'Ð',
            'e' => '乇',
            'f' => 'ｷ',
            'g' => 'Ǥ',
            'h' => 'ん',
            'i' => 'ﾉ',
            'j' => 'ﾌ',
            'k' => 'ズ',
            'l' => 'ﾚ',
            'm' => 'ᄊ',
            'n' => '刀',
            'o' => 'o',
            'p' => 'ｱ',
            'q' => 'Q',
            'r' => '尺',
            's' => '丂',
            't' => 'ｲ',
            'u' => 'Ц',
            'v' => 'Џ',
            'w' => 'Щ',
            'x' => 'ﾒ',
            'y' => 'ﾘ',
            'z' => '乙'
        );

        $texto = str_replace(
            array_keys($rep),
            array_values($rep),
            strtolower($texto)
        );

        $api = array (
            'ok' => true,
            'resultado' => array(
                'texto'     => $texto,
                'formato'   => $formato,
                'longitud'  => strlen($texto)
            )
        );
        break;
        default:
        $api = array(
            'ok' => false,
            'resultado' => array(
                'error'         => $lang["format_not_found"],
                'error_codigo'  => 5
            )
        );
        break;
    }

} elseif (!isset($_GET[$parameters[1]]) && isset($_GET[$parameters[2]]) ) {

    $api = array (
        'ok' => false,
        'resultado' => array(
            'error'         => $lang["parameter_text_not_found"],
            'error_codigo'  => 2
        )
    );

} elseif (!isset($_GET[$parameters[2]]) && isset($_GET[$parameters[1]])) {

    $api = array (
        'ok' => false,
        'resultado' => array(
            'error'         => $lang["parameter_format_not_found"],
            'error_codigo'  => 3
        )
    );

} else {

    $api = array (
        'ok' => false,
        'resultado' => array(
            'error'         => $lang["parameters_not_found"],
            'error_codigo'  => 4
        )
    );

}
echo json_encode($api);
?>
