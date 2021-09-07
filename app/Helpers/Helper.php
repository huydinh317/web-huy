<?php
if (!function_exists('showCat')) {
    function showCat($categoies, $parent, $char, $categories_id)
    {
        foreach ($categoies as $cat) {
            if ($cat->parent == $parent) {
                $id = $cat->id;
                if ($id == $categories_id) {
                    echo "<option selected value='$id'>" . $char . $cat->name . "</option>";
                } else {
                    echo "<option value='$id'>" . $char . $cat->name . "</option>";
                }
                $new_parent = $cat->id;
                showCat($categoies, $new_parent, "|---", $categories_id);
            }
        }
    }
}
if (!function_exists('showPrice')) {
    function showPrice($price)
    {
        return number_format($price, 0, '.', '.');
    }
}
