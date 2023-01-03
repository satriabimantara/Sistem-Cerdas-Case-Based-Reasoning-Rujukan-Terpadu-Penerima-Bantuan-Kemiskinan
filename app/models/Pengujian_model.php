<?php
class Pengujian_model
{
    public function transformasiKasusBaru($postData)
    {
        $attributes = array();
        $encoding = array();
        // Pisahkan label dan encoding nya 
        $input = "input-";
        // Atribut A1-3
        for ($i = 1; $i <= 3; $i++) {
            $str = $input . "A" . $i;
            $attributes["A" . $i] = $postData[$str];
            $encoding["A" . $i] = $postData[$str];
        }
        // Atribut K1-K41
        for ($i = 1; $i <= 41; $i++) {
            $str = $input . "K" . $i;
            $value_input = explode('*', $postData[$str]);
            $attributes["K" . $i] = $value_input[0];
            $encoding["K" . $i] = $value_input[1];
        }
        return array($attributes, $encoding);
    }
    public function findAccuracy($cases, $compare_column_1, $compare_column_2)
    {
        $sum_case = 0;
        $n_case = count($cases);
        foreach ($cases as $index_case  => $case) {
            if ($case[$compare_column_1] == $case[$compare_column_2]) {
                $sum_case++;
            }
        }
        return ($sum_case / $n_case) * 100;
    }
}
