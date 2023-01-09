<?php
require_once("../php/dal.php");
function getProducts($where = '1=1', $limit = '')
{
    $query = "SELECT p.*,c.name category_name,s.name size_name,cl.name color_name,r.rating,r.rating_count FROM 
    products p JOIN categories c ON p.category_id=c.id
    JOIN sizes s on s.id = p.size_id
    JOIN colors cl on cl.id = p.color_id
	LEFT JOIN (SELECT product_id,AVG(rate) rating,COUNT(0) rating_count FROM `ratings` GROUP BY product_id) r ON r.product_id = p.id
    WHERE $where 
    $limit";
    return get_rows($query);
}
