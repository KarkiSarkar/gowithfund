<?php
class Krowd_Themer_Comment{

  public static $instance;

  public static function getInstance() {
    if (!isset(self::$instance) && !(self::$instance instanceof Krowd_Themer_Comment)) {
      self::$instance = new Krowd_Themer_Comment();
    }
    return self::$instance;
  }

  public function __construct(){ 
    add_action('comment_post', array( $this, 'comment_ratings'));
  }

  public function comment_ratings($comment_id) {
    if(isset($_POST['rate'])){
      add_comment_meta($comment_id, 'rate', $_POST['rate']);
    }else{
      add_comment_meta($comment_id, 'rate', '5');
    }
  }

  public function comment_field($aria_req){
    $html = '<div>
              <div class="comment-rating clearfix">
                <label class="field-label" for="comment">'.esc_html__('What is it like to Post?', 'krowd-themer').'</label>
                <ul class="comment-star-rating">
                  <li><a href="#" title="Really bad - 1 star" class="one-star" data-rate="1"><i class="far fa-star"></i></a></li>
                  <li><a href="#" title="Bad - 2 stars" class="two-stars" data-rate="2"><i class="far fa-star"></i><i class="far fa-star"></i></a></li>
                  <li><a href="#" title="Good - 3 stars" class="three-stars" data-rate="3"><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></a></li>
                  <li><a href="#" title="Very good - 4 stars" class="four-stars" data-rate="4"><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></a></li>
                  <li><a href="#" title="Excellent - 5 stars" class="five-stars" data-rate="5"><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></a></li>
                </ul>
                <input type="hidden" id="comment-rating-ip" name="rate" id="rate" value="" />
              </div>
            </div>';
    return $html;
  }

  public function comment_rate($rate) {
    $alt = '';
    switch ($rate) {
      case '0':
        $alt = 'Zero - 0 stars';
        break;
      case '1':
        $alt = 'Really bad - 1 star';
        break;
      case '2':
        $alt = 'Bad - 2 stars';
        break;
      case '3':
        $alt = 'Good - 3 stars';
        break;
      case '4':
        $alt = 'Very good - 4 stars';
        break;
      case '5':
        $alt = 'Excellent - 5 stars';
        break;
      default:
        $alt = 'No grade';
        break;
    }

    for ($i = 0; $i < 5; $i++) {
      if ($rate > $i){
        echo '<i class="on fas fa-star"></i>';
      }else{
        echo '<i class="off far fa-star"></i>';
      }
    }
  }

  public function get_average_ratings($id) {
    $comment_array = get_approved_comments($id);
    $count = 0;
    if ($comment_array) {
      $i = 0;
      $total = 0;
      foreach($comment_array as $comment){
        $rate = get_comment_meta($comment->comment_ID, 'rate');
        if(isset($rate[0]) && $rate[0] !== '') {
          $i++;
          $total += $rate[0];
          $count++;
        }
      }
      if($i == 0)
        return array(
          'rate' =>  0,
          'count' => 0
        );
      else
        return array(
          'rate' =>  round($total/$i, 1),
          'count' => $count
        ); 
    } else {
      return array(
        'rate' =>  0,
        'count' => 0
      );
    }
  }

  public function rating_display($rate){
    $width = ($rate/5) * 100;
    $ouput = '';
    $ouput .= '<div class="course-review-wrapper">';
      $ouput .= '<ul class="base-starts">';
        for ($i=1; $i <= 5; $i++) { 
          $ouput .= '<li><i class="fa fa-star"></i></li>';
        }
      $ouput .= '</ul>';
      $ouput .= '<ul class="votes-starts" style="width: '.esc_attr($width).'%;">';
        for ($i=1; $i <= 5; $i++) { 
          $ouput .= '<li><i class="fa fa-star"></i></li>';
        }
      $ouput .= '</ul>';    
    $ouput .= '</div>';
    return $ouput;
  }

  public function rating_results($id){
    $comment_array = get_approved_comments($id);
    $results = array(
      '1_star' => 0,
      '2_star' => 0,
      '3_star' => 0,
      '4_star' => 0,
      '5_star' => 0,
      'count'  => 0
    );
    if ($comment_array) {
      $i = 0;
      $total = 0;
      foreach($comment_array as $comment){
        $rate = get_comment_meta($comment->comment_ID, 'rate');
        if(isset($rate[0]) && $rate[0] !== '') {
          $i++;
          $results['count']++;
          if($rate[0] == 1){
            $results['1_star']++;
          }elseif($rate[0] == 2){
            $results['2_star']++;
          }elseif($rate[0] == 3){
            $results['3_star']++;
          }elseif($rate[0] == 4){
            $results['4_star']++;
          }elseif($rate[0] == 5){
            $results['5_star']++;
          }
        }
      }
    }
    return $results;
  }

}

new Krowd_Themer_Comment();