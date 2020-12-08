# Mini Blog

Built for code demonstration only. This application lists blog posts from users, with some small functionality added.

## How to run
1. Create a database and set the credentials on the `.env` file
2. Generate an application key `php artisan key:generate`
3. Run the migrations `php artisan migrate`
4. Run the setup command `php artisan blog:setup`
5. Serve the application `php artisan serve`
6. To import blog posts from the external api run `php artisan blog:import`

### Requirements
- [x] Homepage will show all blog posts
- [x] Any user will be able to register in the platform...
- [x] ...login to a private are to see the posts he created...
- [x] ...create new posts, won't be able to edit or delete
- [x] Import new blog posts from REST endpoint, save under "admin" user
- [x] Minimize the strain put on the system
- [x] (Own) Make a setup command to add the admin user and a couple blog posts

### Main application files
- [app/Http/Controllers/HomeController.php](https://github.com/rodvilla/mini-blog/blob/master/app/Http/Controllers/HomeController.php)
- [app/Http/Controllers/PostsController.php](https://github.com/rodvilla/mini-blog/blob/master/app/Http/Controllers/PostsController.php)
- [app/Console/Commands/SetupBlogCommand.php](https://github.com/rodvilla/mini-blog/blob/master/app/Console/Commands/SetupBlogCommand.php)
- [app/Jobs/ImportPostsJob.php](https://github.com/rodvilla/mini-blog/blob/master/app/Jobs/ImportPostsJob.php)
- [app/Models/Post.php](https://github.com/rodvilla/mini-blog/blob/master/app/Models/Post.php)

### Topics applied in this tool
- Blade Components
- Authentication
- Eloquent Models
- Cache
- HTTP Client

### Built with
- Laravel 8
- Laravel Breeze (for auth scaffold)
- Tailwind 2
