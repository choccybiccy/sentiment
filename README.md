# Sentiment Analysis

Various analysis tools using the Datumbox API.

## Prerequisites
As this API uses web services from Datumbox you'll need to register an account with them to obtain an API key.

http://www.datumbox.com/users/register/

## Installation
Installation is a cinch with composer..
```bash
composer require choccybiccy/sentiment
```

## Usage
```php
use Choccybiccy\Sentiment\Factory;

$factory = new Factory();

$sentiment = $factory->create(
    Factory::ENDPOINT_ANALYSIS_SENTIMENT,
    "MyApiKey"
);

$result = $sentiment->analyse("I don't like her, I love her!");
echo "The sentiment is " . $result->getResult(); # Will return: The sentiment is positive
```

### Available endpoints
| Service | Constant | Class | Method |
|---------|----------|-------|--------|
| Sentiment | `\Choccybiccy\Sentiment\Factory::ENDPOINT_ANALYSIS_SENTIMENT` | `Choccybiccy\Sentiment\Analysis\Sentiment` | `analyse(str $text)` |
| Subject analysis | `\Choccybiccy\Sentiment\Factory::ENDPOINT_ANALYSIS_SUBJECTIVITY` | `Choccybiccy\Sentiment\Analysis\Subjectivity` | `analyse(str $text)` |
| Readability assessment | `\Choccybiccy\Sentiment\Factory::ENDPOINT_ASSESSMENT_READABILITY` | `Choccybiccy\Sentiment\Assessment\Readability` | `assess(str $text)` |
| Topic classification | `\Choccybiccy\Sentiment\Factory::ENDPOINT_CLASSIFICATION_TOPIC` | `Choccybiccy\Sentiment\Classification\Topic` | `classify(str $text)` |
| Similarity | `\Choccybiccy\Sentiment\Factory::ENDPOINT_COMPARISON_SIMILARITY` | `Choccybiccy\Sentiment\Comparison\Similarity` | `compare(str $original, str $copy)` |
| Adult content detection | `\Choccybiccy\Sentiment\Factory::ENDPOINT_COMPARISON_ADULT` | `Choccybiccy\Sentiment\Detection\Adult` | `detect(str $text)` |
| Commercial detection | `\Choccybiccy\Sentiment\Factory::ENDPOINT_COMPARISON_COMMERCIAL` | `Choccybiccy\Sentiment\Detection\Commercial` | `detect(str $text)` |
| Educational detection | `\Choccybiccy\Sentiment\Factory::ENDPOINT_COMPARISON_EDUCATIONAL` | `Choccybiccy\Sentiment\Detection\Educational` | `detect(str $text)` |
| Gender detection | `\Choccybiccy\Sentiment\Factory::ENDPOINT_COMPARISON_GENDER` | `Choccybiccy\Sentiment\Detection\Gender` | `detect(str $text)` |
| Language detection | `\Choccybiccy\Sentiment\Factory::ENDPOINT_COMPARISON_LANGUAGE` | `Choccybiccy\Sentiment\Detection\Language` | `detect(str $text)` |
| Spam detection | `\Choccybiccy\Sentiment\Factory::ENDPOINT_COMPARISON_SPAM` | `Choccybiccy\Sentiment\Detection\Spam` | `detect(str $text)` |
| Keyword extraction | `\Choccybiccy\Sentiment\Factory::ENDPOINT_EXTRACTION_KEYWORD` | `Choccybiccy\Sentiment\Extraction\Keyword` | `extract(str $text)` |
| Text extraction | `\Choccybiccy\Sentiment\Factory::ENDPOINT_EXTRACTION_TEXT` | `Choccybiccy\Sentiment\Extraction\Text` | `extract(str $text)` |


## Testing
```bash
vendor/bin/phpunit
```

## Authors
Written and maintained by Martin Hughes.

## Thanks
Thanks to [Datumbox](http://www.datumbox.com/) for providing the web services.

## Copyright & licensing
See [LICENSE](LICENSE)
