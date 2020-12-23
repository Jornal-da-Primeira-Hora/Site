<?php
    function interpreterEWML($file, &$btn_click_abrir_count) {
        $tmp1 = '';
        $tmp2 = '';
        $result = '';
        $lines = file($file);
        $close_tag = array();
        $close_tag_character = array(' ', ' ', ' ');
        $close_open_tag = array();
        $close_open_tag_character = array(' ', ' ', ' ');
        
        for ($lineCount = 0; $lineCount < count($lines); ++$lineCount) {
            $words = explode(' ', $lines[$lineCount]);

            if (ord($lines[$lineCount]) == 13 or strlen($lines[$lineCount]) == 0) {

                if ($close_tag_character[count($close_tag_character) - 1] == ';') {
                    $result = $result. '<br/><br/>';

                }
                else if (strlen($lines[$lineCount]) == 2 or ord($lines[$lineCount]) == 13) {
                    $result = $result. '<br/>';
                }

            }

            for ($wordCount = 0; $wordCount < count($words); ++$wordCount) {
                $words[$wordCount] = trim($words[$wordCount]);

                if ($words[$wordCount] == '#') {
                    $result = $result. "<h1 class='normal-title'>";
                    array_push($close_tag, '</h1>');
                    array_push($close_tag_character, "\n");
                }
                else if ($words[$wordCount] == '#*') {
                    $result = $result. "<h1 class='bold-title'>";
                    array_push($close_tag, '</h1>');
                    array_push($close_tag_character, "\n");
                }
                else if ($words[$wordCount] == '##') {
                    $result = $result. "<h2 class='normal-title'>";
                    array_push($close_tag, '</h2>');
                    array_push($close_tag_character, "\n");
                }
                else if ($words[$wordCount] == '##*') {
                    $result = $result. "<h2 class='bold-title'>";
                    array_push($close_tag, '</h2>');
                    array_push($close_tag_character, "\n");
                }
                else if ($words[$wordCount] == '//') {
                    $result = $result. '<line1></line1>';
                    array_push($close_tag, ' ');
                    array_push($close_tag_character, "\n");
                }
                else if ($words[$wordCount] == '/') {
                    $result = $result. '<line2></line2>';
                    array_push($close_tag, ' ');
                    array_push($close_tag_character, "\n");
                }
                else if ($words[$wordCount] == '(img') {
                    $result = $result. "<img src=";
                    array_push($close_tag, "/>");
                    array_push($close_tag_character, ')');
                }
                else if ($words[$wordCount] == '(video') {
                    $result = $result. "<iframe src=";
                    array_push($close_tag, "></iframe>");
                    array_push($close_tag_character, ')');
                }
                else if ($words[$wordCount] == ':') {
                    $result = $result. "<p>";
                    array_push($close_tag, '</p>');
                    array_push($close_tag_character, ';');
                }
                else if ($words[$wordCount] == '(div') {
                    $result = $result. '<div>';
                    array_push($close_tag, '</div>');
                    array_push($close_tag_character, ')');
                }
                else if ($words[$wordCount] == '(div:imagem-texto') {
                    $result = $result. "<div class='image-text'>";
                    array_push($close_tag, '</div>');
                    array_push($close_tag_character, ')');
                }
                else if ($words[$wordCount] == '(div:imagens') {
                    $result = $result. "<div class='images'>";
                    array_push($close_tag, '</div>');
                    array_push($close_tag_character, ')');
                }
                else if ($words[$wordCount] == '(div:imagem') {
                    $result = $result. "<div class='image'>";
                    array_push($close_tag, '</div>');
                    array_push($close_tag_character, ')');
                }
                else if ($words[$wordCount] == ':botãoAbrir:') {
                    ++$btn_click_abrir_count;
                    $result = $result. "<span class='btn-click-open' id='abrir-paragrafo-$btn_click_abrir_count'> <svg fill='var(--first-color-focused)' viewBox='0 0 24 24' focusable='false'><path d='M5.41 7.59L4 9l8 8 8-8-1.41-1.41L12 14.17'></path></svg> </span>";
                    array_push($close_tag_character, "\n");
                }
                else if ($words[$wordCount] == ':<') {
                    $result = $result. "<p class='p-disappear' id='p-abrir-paragrafo-$btn_click_abrir_count'>\n";
                    array_push($close_tag, '</p>');
                    array_push($close_tag_character, ';');
                }
                else if ($words[$wordCount] == '(div:abrir') {
                    $result = $result. "<div class='div-open'>";
                    array_push($close_tag, '</div>');
                    array_push($close_tag_character, ')');
                }
                else if ($words[$wordCount] == '-') {
                    $result = $result. "<a target='_black' href='";
                    array_push($close_tag, '</a>');
                    array_push($close_tag_character, "\n");
                    array_push($close_open_tag, "'>");
                    array_push($close_open_tag_character, '~');
                }
                else if ($words[$wordCount] == '->') {
                    $result = $result. '<i>';
                    array_push($close_tag, '</i>');
                    array_push($close_tag_character, "\n");
                }
                else if ($words[$wordCount] == '*') {
                    $result = $result. '<strong>';
                    array_push($close_tag, '</strong>');
                    array_push($close_tag_character, "\n");
                }
                else if ($words[$wordCount] == '_') {
                    $result = $result. '<u>';
                    array_push($close_tag, '</u>');
                    array_push($close_tag_character, "\n");
                }
                else if ($words[$wordCount] == '--') {
                    $result = $result. '<strike>';
                    array_push($close_tag, '</strike>');
                    array_push($close_tag_character, "\n");
                }
                else if ($words[$wordCount] == '(div:copyright') {
                    $result = $result. "<div class='copyright'>";
                    array_push($close_tag, '</div>');
                    array_push($close_tag_character, ')');
                }
                else if ($words[$wordCount] == $close_open_tag_character[count($close_open_tag_character) - 1]) {
                    $result = $result. ' '. $close_open_tag[count($close_open_tag) - 1];
                    
                    array_pop($close_open_tag_character);
                    array_pop($close_open_tag);
                }
                else if ($words[$wordCount] == $close_tag_character[count($close_tag_character) - 1]) {
                    $result = $result. $close_tag[count($close_tag) - 1];
                    array_pop($close_tag);
                    array_pop($close_tag_character);
                }
                else {
                    $result = $result. ' '. $words[$wordCount];

                }

            }

            // $tmp = $close_tag_character[count($close_tag_character) - 1];
            // if ($tmp != ';'&& $tmp != ')') {
            //     $result = $result. ' '. $close_tag[count($close_tag) - 1];
            //     array_pop($close_tag);
            //     array_pop($close_tag_character);
            // }

            $tmp1 = strpos($lines[$lineCount], $close_tag_character[count($close_tag_character) - 1] );
            $tmp2 = strpos($lines[$lineCount], '.;');

            if ($tmp1 and !$tmp2 and $close_tag_character[count($close_tag_character) - 1] != ')')
            {
                $result = $result. ' '. $close_tag[count($close_tag) - 1];

                array_pop($close_tag);
                array_pop($close_tag_character);
            }

        }

        return (
            str_replace('.;', ';',
            str_replace('.:', ':',
            str_replace('.)', ')',
            str_replace('.-', '-',
                $result ) ) ) )
        );
    }
?>

<script src='./script.js'></script>