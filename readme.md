# Precondition
- PHP >=8.2
- composer
- make

# Setup
```shell
make install
```

# Issue

## 1) Running without deprecation details (works fine)
Running phpunit without displaying deprecations details works as expected.
```shell
make phpunit-without-deprecation-details
```

## 2) Run with enabled deprecations:
First naiv approach to enable deprecations.
- phpunit.displayDetailsOnTestsThatTriggerDeprecations="true"
- phpunit.source.ignoreSuppressionOfDeprecations="true"
```shell
make phpunit-with-some-deprecations
```

*BUT* the deprecation baseline (`some-deprecations-baseline.xml`) does not contain silenced deprecations.
Running the same command using the generated baseline will cause output of silenced deprecation:
```shell
make run-phpunit-with-some-deprecations-baseline
```

## 3) Run with additionally enabling ignoring suppression of PHP warnings.
I checked a bit the code and I stumble over the fact if I ignore PHP warnings in the phpunit configuration file then the
silenced deprecations also end up in baseline file:

```shell
make phpunit-with-all-deprecations
```

Running the same command against that generated baseline will not show any deprecations anymore.
```shell
make run-phpunit-with-all-deprecations-baseline
```

