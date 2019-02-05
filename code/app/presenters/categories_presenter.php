<?php
class Categories_Presenter {

    public static function getCategories(array $array) {
        $html = '';

        $counter = 0;
        foreach ($array as $arrayitem) {
            $counter++;

            $html .= <<< HTML
                      <tr>
                            <td>$counter</td>
                            <td><a href="#" id="category" data-type="text" data-pk="$arrayitem[id]" data-url="categories" data-title="Edit Category" data-placement="right" data-placeholder="Category Name">$arrayitem[name]</a></td>
                            <td>$arrayitem[total]</td>
                            <td class="tdaction">
                               <a class="confirm-delete" data-label="Category" data-page="categories" data-id="$arrayitem[id]" href="javascript:void(0);"><i class="glyphicon-2x glyphicon glyphicon-trash tip" data-original-title="Delete" data-placement="bottom"></i></a>&nbsp;&nbsp;
                               <a href="todos/$arrayitem[id]"><i class="glyphicon-2x glyphicon glyphicon-circle-arrow-right tip" data-original-title="View" data-placement="bottom"></i></a>
                            </td>
                        </tr>
HTML;
        }

        return $html;
    }
}
