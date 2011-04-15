/*
        
        Copyright 2011 Saket Choudhary  <saketkc@gmail.com>
        
        This program is free software; you can redistribute it and/or modify
        it under the terms of the GNU General Public License as published by
        the Free Software Foundation; either version 2 of the License, or
        (at your option) any later version.
        
        This program is distributed in the hope that it will be useful,
        but WITHOUT ANY WARRANTY; without even the implied warranty of
        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
        GNU General Public License for more details.
        
        You should have received a copy of the GNU General Public License
        along with this program; if not, write to the Free Software
        Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
        MA 02110-1301, USA.
       */
$(document).ready(function()
{
var number=01;
$(".search_input").focus();
$(".search_input").keyup(function() 
{
//	$(".search_input").blur();
//$(".inner").focusout();
var search_input = $(this).val();
var keyword= encodeURIComponent(search_input);
//var keyword= (search_input);
$.ajax({
   type: "GET",
   url: "ajax.php",
   data:{'op':'ajaxrequest','query':keyword},
   success: function(msg){
     $('.inner').html(msg);
        }
 });
});
$('#next').click(function() {
  number=number+1;
  var keyword = $(".search_input").val();
  $.ajax({
   type: "GET",
   url: "ajax.php",
   data:{'op':'numberrequest','query':keyword,'number':number},
   success: function(msg){
     $('.inner').html(msg);//=msg;
   }
 });
});
$('#prev').click(function() {
  
  number=number-1;
  var keyword = $(".search_input").val();
  $.ajax({
   type: "GET",
   url: "ajax.php",
   data:{'op':'numberrequest','query':keyword,'number':number},
   success: function(msg){
     $('.inner').html(msg);//=msg;
    }
 });
});
});
