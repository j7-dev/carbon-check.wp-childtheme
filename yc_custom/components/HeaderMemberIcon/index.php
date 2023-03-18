<?php

function carbon_header_member_icon()
{
  $html = '';
  ob_start();
?>

<?php
  $html .= ob_get_clean();


  return $html;
}
add_shortcode('dotiavatar', 'carbon_header_member_icon');
function change_heading_widget_content($widget_content, $widget)
{

  if ('icon' === $widget->get_name()) {

    $settings = $widget->get_settings();
    if ('carbon_header_member_icon' === $settings['_element_id']) {

      if (is_user_logged_in()) {
        $html = '<div id="menu-dropdown" class="relative z-50">' . $widget_content;
        $html .= '<ul class="dropdown-items absolute bg-white rounded-xl p-4 shadow-lg w-40 right-0 lg:right-8 list-none" style="display:none"><li><a class="text-black" href="' . wp_logout_url(home_url()) . '">登出<a></li></ul>';

        $html .= '</div>';
        $widget_content = $html;
      } else {
        $html = '<a href="' . site_url('login') . '">' . $widget_content . '
        </a>';
        $widget_content = $html;
      }
    }
  }

  return $widget_content;
}
add_filter('elementor/widget/render_content', 'change_heading_widget_content', 10, 2);
