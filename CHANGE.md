Change Log: `yii2-money`
========================

## Version 1.2.3

**Date**: 09-Oct-2018

- Bump composer dependencies.
- Move all source code to `src` directory.

## Version 1.2.2

**Date:** 23-May-2017

- (bug #26, #23, #22, #16, #9): Core plugin custom fixes for right precision handling.
    - fixes mask display bugs when precision is set to zero and suffix is set 
    - fixes masking when precision is set but the decimal part length is less than precision length (for example 1400.50 with precision 2 was wrongly displayed as 140.05 - this change fixes this bug where the leading zeros after decimals were omitted)
- (enh #25, #11, #10): Update to release v3.1.1 of source plugin.
- (bug #24, #17, #12, #4): Enhance to calculate changed money mask when enter key is pressed.
- (enh #21, #20): Fix plugin behavior to show default placeholder when `allowEmpty` is `true`.
- (enh #15): New `displayInputName` property to control display input name attribute.
- Add composer alias for latest dev master release.
- Add github contribution and issue/PR logging templates.
- Update copyright year to current.

## Version 1.2.1

**Date:** 17-Jun-2015

- (enh #13): Set composer version dependencies.

## Version 1.2.0

**Date:** 25-Nov-2014

- (enh #7): Enhance widget to use updated plugin registration from Krajee base

## Version 1.1.0

**Date:** 20-Nov-2014

- (bug #6): Extend from the correct base widget `kartik\base\InputWidget`.
- Set dependency on Krajee base components
- Set release to stable

## Version 1.0.0

**Date**: 01-Jun-2014

- PSR4 alias change
- Initial release