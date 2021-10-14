## Fetch Team Avatars

This script grabs members of an org's team and outputs a Markdown-formatted table of their avatars.

### Installation

To install, you'll need [Composer](https://getcomposer.org/):

```bash
cd fetch-team-avatars
composer install
```

### Usage

To use the script, you'll need to define a `.env` file in the same directory following the template in `.env.tmp`.

- `GH_TOKEN` is a personal access token that has access to the org you're requesting
- `GH_USER` is the username to use (most likely yours) and the account the token belongs to
- `GH_REPO` is the URL portion of the API request for the team. See [this documentation](https://docs.github.com/en/rest/reference/teams#members) for more information on that structure.

Then you should be able to just run it:

```php
php run.php
```

And it will output the Markdown table with the team member's avatar and their username as the `alt` text.

The output will look like:

```
| ---- |
| ![user1](https://avatars.githubusercontent.com/u/12345678?u=9bc34549d565d9505b287de0cd20ac77be1d3f2c&v=4) |
| ![user2](https://avatars.githubusercontent.com/u/12345678?u=9bc34549d565d9505b287de0cd20ac77be1d3f2c&v=4) |
| ![user3](https://avatars.githubusercontent.com/u/12345678?u=9bc34549d565d9505b287de0cd20ac77be1d3f2c&v=4) |
```

...and so on