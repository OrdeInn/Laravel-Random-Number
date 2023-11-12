# Introduction

Simple Laravel application with custom artisan command:

```
app:give-number
```

# Usage
It accepts 2 numeric arguments: min(Default: 1) and max(Default: INT_MAX).
Returns a random integer within the range. 

```bash
# returns '108'
php artisan app:give-number 45 999
```

## Constraints
- Arguments should be numeric
- min >= 1
- max >= min and max < INT_MAX