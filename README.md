# NPR Posts Plugin

A WordPress plugin that displays your newest, most popular, and random posts in an elegant tabbed interface.

## Description

NPR Posts Plugin provides a simple yet effective way to showcase different categories of your posts:
- Newest posts
- Most popular posts (based on comment count)
- Random posts

The plugin uses a clean, modern tabbed interface that smoothly transitions between different post lists.

## Features

- Responsive tabbed interface
- Displays 5 posts per category (customizable)
- Supports both regular posts and custom post types
- Easy to implement using shortcode
- Lightweight and optimized for performance
- RTL support
- Async JavaScript loading
- Customizable through WordPress filters

## Installation

1. Download the plugin files
2. Upload the plugin folder to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress

## Usage

### Basic Usage
Use the shortcode `[npr_tab]` in any post, page, or widget where you want to display the tabbed posts interface.

Example:
```
[npr_tab]
```

### Customization Through Filters

The plugin provides filters to customize the query parameters without modifying the plugin files. Here are some common customization examples:

#### 1. Change Number of Posts Displayed
Add this code to your theme's `functions.php` file or a site-specific plugin:

```php
add_filter('npr_query_args', function($args) {
    $args['posts_per_page'] = 10; // Change from default 5 to 10 posts
    return $args;
});
```

#### 2. Include Custom Post Types
To display custom post types alongside regular posts:

```php
add_filter('npr_query_args', function($args) {
    // Replace 'product' and 'course' with your custom post type names
    $args['post_type'] = ['post', 'product', 'course'];
    return $args;
});
```

#### 3. Advanced Customization Example
Customize different parameters based on tab type:

```php
add_filter('npr_query_args', function($args) {
    // Customize based on orderby parameter to target specific tabs
    switch ($args['orderby']) {
        case 'ID': // Newest posts tab
            $args['posts_per_page'] = 8;
            $args['post_type'] = ['post', 'news'];
            break;
            
        case 'comment_count': // Popular posts tab
            $args['posts_per_page'] = 5;
            $args['post_type'] = ['post'];
            $args['minimum_comments'] = 3; // Only posts with at least 3 comments
            break;
            
        case 'rand': // Random posts tab
            $args['posts_per_page'] = 3;
            $args['post_type'] = ['product']; // Only show random products
            break;
    }
    
    return $args;
});
```

#### 4. Filter Posts by Category
Show posts from specific categories:

```php
add_filter('npr_query_args', function($args) {
    $args['category__in'] = [4, 7]; // Replace with your category IDs
    return $args;
});
```

### CSS Customization

The plugin uses the following main CSS classes that you can customize:

- `.wrap`: Main container
- `.tabs`: Tab navigation container
- `.active`: Active tab style
- `#content`: Content area for posts

Add your custom CSS to your theme's stylesheet:

```css
/* Example: Change tab colors */
.tabs li a {
    background: #your-color;
}

.tabs li a.active {
    background: #your-active-color;
}
```

## Requirements

- WordPress 5.0 or higher
- PHP 7.2 or higher

## Frequently Asked Questions

### How do I change the number of posts displayed?
Use the `npr_query_args` filter as shown in the Customization section above.

### Can I show custom post types?
Yes, use the `npr_query_args` filter to modify the `post_type` parameter. See the examples in the Customization section.

### Can I change the tab labels?
Currently, the tab labels are filterable through WordPress translations. You can add translations for your language or use a translation plugin.

## Changelog

### 1.0.0
- Initial release
- Added customization filters
- Added support for custom post types
- Added RTL support

## License

This plugin is licensed under the GPL v2 or later.

## Credits

Created by Sadeq Yaqobi (http://siteyar.net/sadeq-yaqobi/)

## Support

For support, please visit http://siteyar.net/plugins/

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.
