<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>MapTur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />

    <style>
        .t {
            color: white;
        }
    </style>

    <?php
    // ==== teste 01 ===
    //caso 1
    $arr = array(3, 1, 2, 2, 4);
    //caso 2
    $arr2 = array(8, 5, 5, 5, 5, 1, 1, 1, 4, 4);
    //caso 3
    $arr3 = array(1, 2, 3, 7, 1, 8, 2);

    // ==== teste 02 ===
    //caso 1
    $fibonacci1 = fibonacci(4);
    //caso 2
    $fibonacci2 = fibonacci(5);
    //caso 3
    $fibonacci3 = fibonacci(8);
    //caso 4
    $fibonacci4 = fibonacci(1);
    //caso 5
    $fibonacci5 = fibonacci(3);
    //caso 6
    $fibonacci6 = fibonacci(10);

    function orderArray($array, $fnOrderArray = false, $fnReverse = false)
    {
        $arr = $array;

        $firstArr  = [];
        $secondArr = [];

        $frequency = array_count_values($arr);

        foreach ($frequency as $key => $value) {
            if ($value == 1) {
                $firstArr[] = $key;
            } else if ($value > 1) {
                for ($i = 0; $i < $value; $i++) {
                    $secondArr[] = $key;
                }
            }
        }

        if ($fnOrderArray) {
            sort($firstArr);
            sort($secondArr);
        }

        if ($fnReverse) {
            $secondArr = array_reverse($secondArr);
        }

        $resultFinaly = array_merge($firstArr, $secondArr);
        return $resultFinaly;
    }

    function fibonacci($n)
    {
        if ($n == 1 || $n == 0) {
            $sequence = array(0);
        } else if ($n > 1) {
            $sequence = array(0, 1);
            for ($i = 2; $i < $n; $i++) {
                $sequence[$i] = $sequence[$i - 1] + $sequence[$i - 2];
            }
            sort($sequence);
        }

        $preview = '';
        foreach ($sequence as $f) {
            $preview = $preview . "$f, ";
        }

        return $preview;
    }

    function sequenciaMagica($s)
    {
        $vogais   = array('a', 'e', 'i', 'o', 'u');
        $maxLen   = 0;
        $seqAtual = '';

        for ($i = 0; $i < strlen($s); $i++) {

            $char = $s[$i];

            if (in_array($char, $vogais)) {

                $seqAtual .= $char;

                if ($seqAtual == 'aeiou') {
                    $maxLen = max($maxLen, strlen($seqAtual));
                }
            } else {

                if ($seqAtual == 'aeiou') {
                    $maxLen = max($maxLen, strlen($seqAtual));
                }

                $seqAtual = '';
            }
        }

        return $maxLen;
    }

    function magica($s)
    {
        $vogais  = 'aeiou';
        $i       = $j = 0;
        $n       = strlen($s);
        $max_len = 0;
        while ($i < $n && $j < 5) {
            if ($s[$i] == $vogais[$j]) {
                $j++;
                if ($j == 5) {
                    $max_len = max($max_len, $i+1);
                    $j = 0;
                }
            }
            $i++;
        }
        return $max_len;
    }

    // $string = 'aeiaaioooaauuaeiou';
    $string = 'ioeueooeuieoaioeoooiioieueoaiieaeaoeioiiaueueiououeiueeaaueeueaeoaaaouoeoieouaauooeuuoeauuaauaeoee
    uiueeeuiieooeuaooeiaeueaaaaiooeaoiiiaaaooeiioaiiieieauaoeuiiueuioouuaoaioeiaiaaaaoeeaiuiaeoiiuauiiaeiuuaoa
    eaaaaeoeueieoaaaooueioaauieieouoeouieaueuuaiiueoouioueuaaauaoeueuoouieuuouuoueoaaeuuouueieuouiooa
    iuaoeuaeiaueuuieeiuaaeuiuuiuoiaiaeauuuaeeuuuuoieoieuaoiiuoeiaeaeeauoueaiuooiaoaiuoouoeeueeuaoeueiaiioi
    ouueeaaoeoeauouuieeoaoioauieeeieeaaiuiaaeiaeueuouuaoaoiiaoeoaoeuieeouiiiiauauueaeouaeeeaoeaaaeouuue
    oeoiueeoeiouaoeaaeeoaeaiiuouoaaeiuaiaeueuauaoauueuoeueueauuuueeeeuaouaaueaiouoeuooeiouoiiiueauaua
    euaauuoeuoaeeouoouoeeeoieoaouiaaioiuoeuaaouuiioieoiiaueueuieouaiioeuaeoeieaoeiuooueeoeuueueioaoaauo
    ooiiueueooeuouauuaiuiaoieeeeoouoeiaaaeieiooeouioeuooeeiauouueiuieaeaieeooaoeiuu
    Resultado esperado';
    // $comprimento = sequenciaMagica($string);
    $comprimento = magica($string);
    echo $comprimento; // 10
    ?>
</head>

<body class="bg bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="mt-3 t">Candito - Renildo Paes</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12 card text-bg-secondary">
                <div class="card-body">

                    <section>
                        <div class="row">
                            <div class="col-6">
                                <h3 class="t">1) Você consegue ordenar?</h3>
                            </div>
                        </div>

                        <div class="row">
                            <div class="row">
                                <div class="col t">
                                    Caso de teste 01 => Resultado esperado => array(1, 3, 4, 2, 2)
                                </div>
                            </div>

                            <div class="row">
                                <div class="col t">
                                    <?php $resultOrder = orderArray($arr, true, false);
                                    echo '<pre>';
                                    print_r($resultOrder); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="row">
                                <div class="col t">
                                    Caso de teste 02 => Resultado esperado => array(8, 4, 4, 1, 1, 1, 5, 5, 5, 5)
                                </div>
                            </div>

                            <div class="row">
                                <div class="col t">
                                    <?php $resultOrder2 = orderArray($arr2, false, true);
                                    echo '<pre>';
                                    print_r($resultOrder2); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="row">
                                <div class="col t">
                                    Caso de teste 03 => Resultado esperado => array(8, 4, 4, 1, 1, 1, 5, 5, 5, 5)
                                </div>
                            </div>

                            <div class="row">
                                <div class="col t">
                                    <?php $resultOrder3 = orderArray($arr3, false, true);
                                    echo '<pre>';
                                    print_r($resultOrder3); ?>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section>
                        <div class="row">
                            <div class="col-6">
                                <h3 class="t">2) Fibonacci</h3>
                            </div>
                        </div>

                        <div class="row">
                            <div class="row">
                                <div class="col t">
                                    Caso de teste 01 => Resultado esperado => 0, 1, 1, 2
                                </div>
                            </div>

                            <div class="row">
                                <div class="col t mx-4">
                                    <?php echo "R: $fibonacci1"; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="row">
                                <div class="col t">
                                    Caso de teste 02 => Resultado esperado => 0, 1, 1, 2, 3
                                </div>
                            </div>

                            <div class="row">
                                <div class="col t mx-4">
                                    <?php echo "R: $fibonacci2"; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="row">
                                <div class="col t">
                                    Caso de teste 03 => Resultado esperado => 0, 1, 1, 2, 3, 5, 8, 13
                                </div>
                            </div>

                            <div class="row">
                                <div class="col t mx-4">
                                    <?php echo "R: $fibonacci3"; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="row">
                                <div class="col t">
                                    Caso de teste 04 => Resultado esperado => 0
                                </div>
                            </div>

                            <div class="row">
                                <div class="col t mx-4">
                                    <?php echo "R: $fibonacci4"; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="row">
                                <div class="col t">
                                    Caso de teste 05 => Resultado esperado => 0, 1, 1
                                </div>
                            </div>

                            <div class="row">
                                <div class="col t mx-4">
                                    <?php echo "R: $fibonacci5"; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="row">
                                <div class="col t">
                                    Caso de teste 06 => Resultado esperado => 0, 1, 1, 2, 3, 5, 8, 13, 21, 34
                                </div>
                            </div>

                            <div class="row">
                                <div class="col t mx-4">
                                    <?php echo "R: $fibonacci6"; ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>