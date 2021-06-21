<?php


class db_data extends CI_Model {

  public function dbSelect($table,$where = null){
  
  
  if($where){
  $this->db->where($where);
  }

  $query = $this->db->get($table);
   
   return $query->result() ; 
		
  }
  
  

} 







  
 /*أنا هنا عمل if
 لأني إذا أضفت where رح يعمل where user='fdjfglj...'
 وإذا لم اقم بتعيين where لن يعمل هذا الكود $this->db->where($where);
 لهذا انا عملت $where = null افتراضي يعني 
 هل هذا واضح ؟لك؟
 yes
 */
  
  
  /*لما نضيف  $this->db->where()
رح يكون شكل الإستعلام كالتالي
$where رح يكون array() عبارة عن key value 
بهذه الطريقة 
array('username'=>'alkannas') مثلا
عندما نضيف
$this->db->where(array('username'=>'alkannas'));
ح يكون شكل الإستعلام كالتالي 
 
select * from $table where username="alkannas"
اضن إن هذا واضح ؟
واضح بس انا مابدي يكون الاستعلام تابت يعني username="alkannas"
نع هذا للتوضيح فعم
*/
