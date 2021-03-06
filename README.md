# LMS Helper package
[![StyleCI](https://github.styleci.io/repos/317586930/shield)](https://github.styleci.io/repos/317586930) ![GitHub PHP Composer](https://img.shields.io/github/workflow/status/gihan9a/lms-service-helper-php/PHP%20Composer?label=Composer) ![GitHub PHP Static Analysis](https://img.shields.io/github/workflow/status/gihan9a/lms-service-helper-php/PHP%20Static%20Analysis?label=Static%20Analysis) ![GitHub Workflow Status](https://img.shields.io/github/workflow/status/gihan9a/lms-service-helper-php/PHP%20Testing?label=Testing) [![codecov](https://codecov.io/gh/gihan9a/lms-service-helper-php/branch/main/graph/badge.svg?token=P6LDCJF78I)](https://codecov.io/gh/gihan9a/lms-service-helper-php)

This is a composer library package for LMS microservices.  
This package contains helper Classes, Traits, utilities etc.

## Include this package in your composer project

Add following repository configuration under `repositories`.

```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/gihan9a/lms-service-helper-php"
    }
]
```

Now add the package via `composer require`  
`composer require gihan9a/lms-service-helper-php`


## Testing

### Code quality testing

Run following composer script commands to run tests and other code quality tools

Run PHPUnit tests  
`composer run-script test`

Run PHPUnit tests with coverage (output in HTML format inside `coverage` directory)  
`composer run-script test:coverage`

Run Static analyzer tool with `psalm`  
`composer run-script psalm`

Run mutation testing with `infection`
`composer run-script infection`

### Testing GitHub workflow locally

Install `act` tool https://github.com/nektos/act

Then run following command

`act -P ubuntu-latest=shivammathur/node:latest`