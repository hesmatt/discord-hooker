
# Discord Hooker

Discord Hooker is a lighweight Discord webhook client library for PHP (>=7.0)




## Installation

You just make your project require it via Composer 👀

```bash
  composer require hesmatt/discord-hooker
```

## Usage

It's pretty simple to use Discord Hooker, let's start with an example that includes just message.

#### Basic usage


```php
use HesMatt\DiscordHooker\Client\Webhook;

$webhook = new Webhook('Your webhook _URL_');

$webhook->setMessage('I am a Discord Hooker');

$webhook->send();
```

The result

![](https://i.imgur.com/TWZSGe6.png)


We can also set the username and image, you can do that via the Webhook settings in Discord as well, but this way we can 'enforce' a different one that's not set there.

Let's change the code a bit

```php
use HesMatt\DiscordHooker\Client\Webhook;

$webhook = new Webhook('Your webhook _URL_');

$webhook->setMessage('I am a Discord Hooker');
$webhook->setUsername('Hooker');
$webhook->setAvatar('The url of your image'); //Note that this always has to be an URL, not a file!

$webhook->send();
```

The result

![](https://i.imgur.com/yNQpiP5.png)

#### Using embeds

You are also able to build Embeds and send them, that's probably the thing you'll be using the most, to make your messages look sexy 🌶️

It's not hard to build and add Embed, and the best thing is that you can add as many of them as you want (Or as Discord will let you 😉)

Let's start by building an Embed, an Embed can be something as simple as just a title.


```php
use HesMatt\DiscordHooker\Dto\Embed\Embed;

$embed = new Embed();

$embed->setTitle('I am a test embed');

//The description is optional and you don't have to set it, but I wanted to mention is as well :)
$embed->setDescription('I am  test embed description');
```

We need to send it now.

```php
use HesMatt\DiscordHooker\Client\Webhook;

$webhook = new Webhook('Your webhook _URL_');
$embed = new Embed(); //Let's assume we have the different parts we've already built.

//You can use all of the settings for $webhook from earlier, to make the code shorter I won't be typing them again from now on.

$webhook->addEmbed($embed);

$webhook->send();
```

The result

![](https://i.imgur.com/yVU4Puw.png)

The embeds have many settings, I'll be listing them here without 'The result' part, to not make it any longer than it is necessary.

Adding a footer to embed
```php
$embed = new Embed();

$embed->setFooter('The footer text', 'The footer image URL');

//Setting the time part of footer, we can either use
$embed->setTimestamp(new DateTimeImmutable());
//or (To use current time)
$embed->setTimestampNow();
```

Setting a color
```php
$embed = new Embed();

$embed->setColor('327424'); //Discord is using an int value of the color.
```

Setting a thumbnail
```php
$embed = new Embed();

$embed->setThumbnail('Url of the thumbnail image');
```

Adding an author
```php
$embed = new Embed();

$embed->setAuthor('Name of Author','Icon of author','Url of author');
```

Adding a field
```php
$embed = new Embed();

$embed->addField('Text','Value',false); //The last parameter is whether you want the field to be inlined or no.
```
## Contributing

Contributions are always welcome!



## License

[MIT](https://choosealicense.com/licenses/mit/)

