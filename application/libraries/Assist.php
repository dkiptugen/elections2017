<?php
class Assist 
	{
	  var $codeigniter;
	  public function __construct()
	   	{
	   		$this->codeigniter = & get_instance();
	   	}
	  public function secu($username,$password)
			{
        $key=sha1($username);
        $password=substr(md5($password),5,20);
        $key=substr($key,7,5);
        return md5($key.$password);
			}  	
		public function passgen($size)
     {
        $seed = str_split('abcdefghijklmnopqrstuvwxyz'
			                   .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
			                   .'0123456789'
			                   );
        shuffle($seed);
        $rand = '';
        foreach (array_rand($seed,$size) as $k){ $rand .= $seed[$k]; }       	
        return $rand;
      }
    public function picuploads($x=NULL,$config=NULL)
      {
        $config['upload_path']= FCPATH."images";
        $config['allowed_types']='gif|jpg|png|jpeg';
        $config['file_ext_tolower']= TRUE;
        $config['file_name'] = "FILE-".time();              
        $this->codeigniter->load->library('upload', $config);
        if( ! $this->codeigniter->upload->do_upload('userfile'))
          {
            $error = array('error' => $this->codeigniter->upload->display_errors());
            $this->output->set_output(json_encode($error));
          }
        else
          {
            $data = array('upload_data' => $this->codeigniter->upload->data());
            if($x=="upload")
              {
                return $data;
              }
            else
               {
                  $this->output->set_output($data["upload_data"]["file_name"]);
               }              
          }
      }
    public function page($baseurl,$total_rows,$vpp,$urlsegment)
      {
         
        $this->codeigniter->load->library('pagination');
        $config['base_url'] = $baseurl;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $vpp;
        $config['uri_segment'] = $urlsegment;
        $config['num_links'] = 9;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['full_tag_open'] = '<div><ul  class="pagination">';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        //$config['display_pages'] = FALSE;//
        $config['anchor_class'] = 'follow_link';
        $this->codeigniter->pagination->initialize($config);
        $data["links"] = $this->codeigniter->pagination->create_links();
        $data['vpp']=$config['per_page'];
        return (object)$data;
      }
    public function chrstring($string)
      {
        $search = array(chr(0xe2) . chr(0x80) . chr(0x98),
            chr(0xe2) . chr(0x80) . chr(0x99),
            chr(0xe2) . chr(0x80) . chr(0x9c),
            chr(0xe2) . chr(0x80) . chr(0x9d),
            chr(0xe2) . chr(0x80) . chr(0x93),
            chr(0xe2) . chr(0x80) . chr(0x94));
        $replace = array(
            '&lsquo;',
            '&rsquo;',
            '&ldquo;',
            '&rdquo;',
            '&ndash;',
            '&mdash;');
        return str_ireplace("�", "", str_replace($search, $replace, $string));
      }
    public function count_para($story, $pageNo)
      {
        $story = explode('</p>', $story);
        if (count($story) > 1) {
            //   array_pop($story);
        }
        //Input boundary checking
        $noOfPages = ceil(count($story) / $this->paragraphsPerPage);

        $pageNo = (int)$pageNo;

        if ($pageNo < 1) {
            $pageNo = 1;
        } elseif ($pageNo > $noOfPages) {
            $pageNo = $noOfPages;
        }

        $articleStory = array_slice($story, (($pageNo - 1) * $this->paragraphsPerPage), $this->paragraphsPerPage);

        return $articleStory;
        // return $noOfPages;
      }
    public function slugify($text)
      {
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        $text = trim($text, '-');
        if (function_exists('iconv'))
          {
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
          }
        $text = $text;
        $text = preg_replace('~[^-\w]+~', '', $text);
        if (empty($text))
          {
            return 'n-a';
          }
        $text = strtolower($text);
        return $text;
      }
    public function checkifmobileweb()
      {
        $useragent=$_SERVER['HTTP_USER_AGENT'];
        if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
          {
            return TRUE;
          }
      }
    public function removeimg($content)
      {
        $content = preg_replace("/<img[^>]+\>/i", "", $content);         
        return $content;
      }
    public function paraone($content)
      {
        $pos = strpos($content, '.');
        return substr($content, 0, $pos+1);
      }
    public function removeEmptyParagraphs($content)
      {
        return preg_replace('#<p>(\s|&nbsp;|</?\s?br\s?/?>)*</?p>#', '', $content);
      }
    public function strip_word_html($text, $allowed_tags=NULL)
      {
        mb_regex_encoding('UTF-8');
        //replace MS special characters first
        $search = array('/&lsquo;/u', '/&rsquo;/u', '/&ldquo;/u', '/&rdquo;/u', '/&mdash;/u');
        $replace = array('\'', '\'', '"', '"', '-');
        $text = preg_replace($search, $replace, $text);
        //make sure _all_ html entities are converted to the plain ascii equivalents - it appears
        //in some MS headers, some html entities are encoded and some aren't
        $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
        //try to strip out any C style comments first, since these, embedded in html comments, seem to
        //prevent strip_tags from removing html comments (MS Word introduced combination)
        if(mb_stripos($text, '/*') !== FALSE){
            $text = mb_eregi_replace('#/\*.*?\*/#s', '', $text, 'm');
        }
        //introduce a space into any arithmetic expressions that could be caught by strip_tags so that they won't be
        //'<1' becomes '< 1'(note: somewhat application specific)
        $text = preg_replace(array('/<([0-9]+)/'), array('< $1'), $text);
        $text = strip_tags($text, $allowed_tags);
        //eliminate extraneous whitespace from start and end of line, or anywhere there are two or more spaces, convert it to one
        $text = preg_replace(array('/^\s\s+/', '/\s\s+$/', '/\s\s+/u'), array('', '', ' '), $text);
        //strip out inline css and simplify style tags
        $search = array('#<(strong|b)[^>]*>(.*?)</(strong|b)>#isu', '#<(em|i)[^>]*>(.*?)</(em|i)>#isu', '#<u[^>]*>(.*?)</u>#isu');
        $replace = array('<b>$2</b>', '<i>$2</i>', '<u>$1</u>');
        $text = preg_replace($search, $replace, $text);
        //on some of the ?newer MS Word exports, where you get conditionals of the form 'if gte mso 9', etc., it appears
        //that whatever is in one of the html comments prevents strip_tags from eradicating the html comment that contains
        //some MS Style Definitions - this last bit gets rid of any leftover comments */
        $num_matches = preg_match_all("/\<!--/u", $text, $matches);
        if($num_matches){
            $text = preg_replace('/\<!--(.)*--\>/isu', '', $text);
        }

        $text = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $text);
        $text=preg_replace('/class=".*?"/i', '', $text);
        $text=preg_replace('/xss=removed/i', '', $text);
        //$text=preg_replace('/\s\s/i','',$text);
        $text=preg_replace('/<p\s\s>/i','<p>',$text);
        $text = $this->removeEmptyParagraphs($text);
        return $text;
      }  
    public function log($file,$msg)
      {
        file_put_contents(FCPATH."application/logs/".$file,"\n".$msg,FILE_APPEND);
      }
    public function isLoggedIn()
      {
        $this->codeigniter->load->library('session');
        $this->codeigniter->load->helper('url');
        if(($this->codeigniter->session->userdata('logged_in')))
          {
            redirect('cms','refresh');
          }
      }    
    public function e_mail($to,$subject,$message)
      {
        $this->codeigniter->load->library('email');
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'utf8';
        $config['wordwrap'] = TRUE;
        $config['mailtype']='html';
        $config['smtp_crypto']='tls';
        $config['priority']=1;
        $this->codeigniter->email->initialize($config);
        $this->codeigniter->email->from('elections@standardmedia.co.ke', 'Elections 2017')
                                 ->to($to)
                                 ->cc('dkiptugen@standardmedia.co.ke','Dennis Kiptoo')
                                 ->subject($subject)
                                 ->message($message);
        return $this->codeigniter->email->send();
      }
    public function avatar($type)
      {
        if($type=='user')
          {
            
            $avatar='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAhIAAAISCAMAAACu49aNAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBNYWNpbnRvc2giIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MEQyQzNERDE0QTgzMTFFMUI0N0FDQ0U5NDgzQTI2NEYiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MEQyQzNERDI0QTgzMTFFMUI0N0FDQ0U5NDgzQTI2NEYiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDowRDJDM0RDRjRBODMxMUUxQjQ3QUNDRTk0ODNBMjY0RiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDowRDJDM0REMDRBODMxMUUxQjQ3QUNDRTk0ODNBMjY0RiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PmY2mEcAAAGAUExURevr7Jydn5ma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';
          }

          return $avatar;
      }
	}
?>