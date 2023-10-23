<?php





function site_url_locale($path)
{
	$slug = pll_current_language() === 'en' ? 'en/' : '';

	$path = ($path === 'profile' && pll_current_language() === 'en')  ? 'profile-en' : $path;
	$site_url = site_url($slug  . $path);
	return $site_url;
}



function change_heading_widget_content($widget_content, $widget)
{

	if ('icon' === $widget->get_name()) {

		$settings = $widget->get_settings();
		if ('carbon_header_member_icon' === $settings['_element_id']) {

			if (is_user_logged_in()) {
				$html = '<div id="menu-dropdown" class="relative z-50">' . $widget_content;
				$html .= '<ul class="dropdown-items absolute bg-white rounded-xl p-4 shadow-lg w-40 right-0 lg:right-8 list-none" style="display:none"><li class="my-2"><a class="text-black" href="' . site_url_locale('profile') . '">帳號設定<a></li><li class="my-2"><a class="text-black" href="' . wp_logout_url(pll_home_url()) . '">登出<a></li></ul>';

				$html .= '</div>';
				$widget_content = $html;
			} else {
				$html = '<a href="' . site_url_locale('login') . '">' . $widget_content . '
        </a>';
				$widget_content = $html;
			}
		}
	}

	return $widget_content;
}
add_filter('elementor/widget/render_content', 'change_heading_widget_content', 10, 2);
