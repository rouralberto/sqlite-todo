<?php
class Todos_Presenter {

    public static function getTodosList(array $array) {
        $html = '';

        $counter = 0;
        foreach ($array as $arrayitem) {
            $counter++;
            $todo = $arrayitem['todo'];
            $categoryPath = "/todos/$arrayitem[cid]";

            $html .= <<< HTML
                      <tr>
                            <td>$counter</td>
                            <td>$todo</td>
                            <td><a href="$categoryPath">$arrayitem[category]</a></td>
                      </tr>
HTML;
        }

        return $html;
    }

    public static function getTodos(array $array) {
        $html = '';
        $controller = trim(Flight::get('controller'), '/');

        $counter = 0;
        foreach ($array as $arrayitem) {
            $counter++;
            $created = dateFormat($arrayitem['created'], false);
            $categoryPath = "/todos/$arrayitem[cid]";

            // fix empty content
            // $arrayitem['extra'] = str_replace('&lt;p&gt&lt;/p&gt;', '', $arrayitem['extra']);

            if ($controller === 'todos' || uriSegment(3) > 1) {
                $status = $arrayitem['completed'] ? 'Completed' : 'Active';
                $statusClass = $status === 'Completed' ? 'success' : 'primary';

                $rowClass = '';
                $iconClass = 'glyphicon-ok';
                $tipText = 'Mark Completed';

                if ($status === 'Completed') {
                    $rowClass = 'success';
                    $iconClass = 'glyphicon-repeat';
                    $tipText = 'Mark Active';
                }

                $html .= <<< HTML
                      <tr class="$rowClass">
                            <td>$counter</td>
                            <td class="tdtodo">$arrayitem[todo]</td>
                            <td class="tdcategory" data-cid="$arrayitem[cid]"><a href="$categoryPath">$arrayitem[category]</a></td>
                            <td class="tdstatus"><span class="label label-$statusClass">$status</span></td>
                            <td class="tddetail tdaction"><span rel="popover" style="cursor:pointer; color:#428BCA;" class="glyphicon-2x glyphicon glyphicon-info-sign"></span><span class="hidden">$arrayitem[extra]</span></td>
                            <td>$created</td>
                            <td class="tdaction">
                               <a class="edit-todo" data-id="$arrayitem[id]" href="javascript:void(0);"><i class="glyphicon-2x glyphicon glyphicon-edit tip" data-original-title="Edit" data-placement="bottom"></i></a>&nbsp;&nbsp;
                               <a class="todo-process" data-id="$arrayitem[id]" href="javascript:void(0);"><i class="glyphicon-2x glyphicon $iconClass tip" data-original-title="$tipText" data-placement="bottom"></i></a>&nbsp;&nbsp;
                               <a class="confirm-delete" data-label="Todo" data-page="todos" data-id="$arrayitem[id]" href="javascript:void(0);"><i class="glyphicon-2x glyphicon glyphicon-trash tip" data-original-title="Delete" data-placement="bottom"></i></a>
                            </td>
                        </tr>
HTML;
            } else {

                $rowClass = '';
                $iconClass = 'glyphicon-ok';
                $tipText = 'Mark Completed';

                $completedonTD = '';
                if ($controller === 'todos/1') {
                    $iconClass = 'glyphicon-repeat';
                    $tipText = 'Mark Active';
                    $rowClass = 'success';
                    $completedon = dateFormat($arrayitem['completedon'], false);
                    $completedonTD = "<td>$completedon</td>";
                }

                $html .= <<< HTML
                      <tr class="$rowClass">
                            <td>$counter</td>
                            <td class="tdtodo">$arrayitem[todo]</td>
                            <td class="tdcategory" data-cid="$arrayitem[cid]"><a href="$categoryPath">$arrayitem[category]</a></td>
                            <td class="tddetail tdaction"><span rel="popover" style="cursor:pointer; color:#428BCA;" class="glyphicon-2x glyphicon glyphicon-info-sign"></span><span class="hidden">$arrayitem[extra]</span></td>
                            <td>$created</td>
                            $completedonTD
                            <td class="tdaction">
                               <a class="edit-todo" data-id="$arrayitem[id]" href="javascript:void(0);"><i class="glyphicon-2x glyphicon glyphicon-edit tip" data-original-title="Edit" data-placement="bottom"></i></a>&nbsp;&nbsp;
                               <a class="todo-process" data-id="$arrayitem[id]" href="javascript:void(0);"><i class="glyphicon-2x glyphicon $iconClass tip" data-original-title="$tipText" data-placement="bottom"></i></a>&nbsp;&nbsp;
                               <a class="confirm-delete" data-label="Todo" data-page="todos" data-id="$arrayitem[id]" href="javascript:void(0);"><i class="glyphicon-2x glyphicon glyphicon-trash tip" data-original-title="Delete" data-placement="bottom"></i></a>
                            </td>
                        </tr>
HTML;
            }

        }

        return $html;
    }
}
