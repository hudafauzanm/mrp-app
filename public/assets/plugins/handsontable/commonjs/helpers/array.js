"use strict";

exports.__esModule = true;
exports.to2dArray = to2dArray;
exports.extendArray = extendArray;
exports.pivot = pivot;
exports.arrayReduce = arrayReduce;
exports.arrayFilter = arrayFilter;
exports.arrayMap = arrayMap;
exports.arrayEach = arrayEach;
exports.arraySum = arraySum;
exports.arrayMax = arrayMax;
exports.arrayMin = arrayMin;
exports.arrayAvg = arrayAvg;
exports.arrayFlatten = arrayFlatten;
exports.arrayUnique = arrayUnique;
function to2dArray(arr) {
  var i = 0,
      ilen = arr.length;

  while (i < ilen) {
    arr[i] = [arr[i]];
    i++;
  }
}

function extendArray(arr, extension) {
  var i = 0,
      ilen = extension.length;

  while (i < ilen) {
    arr.push(extension[i]);
    i++;
  }
}

function pivot(arr) {
  var pivotedArr = [];

  if (!arr || arr.length === 0 || !arr[0] || arr[0].length === 0) {
    return pivotedArr;
  }

  var rowCount = arr.length;
  var colCount = arr[0].length;

  for (var i = 0; i < rowCount; i++) {
    for (var j = 0; j < colCount; j++) {
      if (!pivotedArr[j]) {
        pivotedArr[j] = [];
      }

      pivotedArr[j][i] = arr[i][j];
    }
  }

  return pivotedArr;
}

/**
 * A specialized version of `.reduce` for arrays without support for callback
 * shorthands and `this` binding.
 *
 * {@link https://github.com/lodash/lodash/blob/master/lodash.js}
 *
 * @param {Array} array The array to iterate over.
 * @param {Function} iteratee The function invoked per iteration.
 * @param {*} [accumulator] The initial value.
 * @param {Boolean} [initFromArray] Specify using the first element of `array` as the initial value.
 * @returns {*} Returns the accumulated value.
 */
function arrayReduce(array, iteratee, accumulator, initFromArray) {
  var index = -1,
      length = array.length;

  if (initFromArray && length) {
    accumulator = array[++index];
  }
  while (++index < length) {
    accumulator = iteratee(accumulator, array[index], index, array);
  }

  return accumulator;
}

/**
 * A specialized version of `.filter` for arrays without support for callback
 * shorthands and `this` binding.
 *
 * {@link https://github.com/lodash/lodash/blob/master/lodash.js}
 *
 * @param {Array} array The array to iterate over.
 * @param {Function} predicate The function invoked per iteration.
 * @returns {Array} Returns the new filtered array.
 */
function arrayFilter(array, predicate) {
  var index = -1,
      length = array.length,
      resIndex = -1,
      result = [];

  while (++index < length) {
    var value = array[index];

    if (predicate(value, index, array)) {
      result[++resIndex] = value;
    }
  }

  return result;
}

/**
 * A specialized version of `.map` for arrays without support for callback
 * shorthands and `this` binding.
 *
 * @param {Array} array The array to iterate over.
 * @param {Function} iteratee The function invoked per iteration.
 * @returns {Array} Returns the new filtered array.
 */
function arrayMap(array, iteratee) {
  var index = -1,
      length = array.length,
      resIndex = -1,
      result = [];

  while (++index < length) {
    var value = array[index];

    result[++resIndex] = iteratee(value, index, array);
  }

  return result;
}

/**
 * A specialized version of `.forEach` for arrays without support for callback
 * shorthands and `this` binding.
 *
 * {@link https://github.com/lodash/lodash/blob/master/lodash.js}
 *
 * @param {Array} array The array to iterate over.
 * @param {Function} iteratee The function invoked per iteration.
 * @returns {Array} Returns `array`.
 */
function arrayEach(array, iteratee) {
  var index = -1,
      length = array.length;

  while (++index < length) {
    if (iteratee(array[index], index, array) === false) {
      break;
    }
  }

  return array;
}

/**
 * Calculate sum value for each item of the array.
 *
 * @param {Array} array The array to process.
 * @returns {Number} Returns calculated sum value.
 */
function arraySum(array) {
  return arrayReduce(array, function (a, b) {
    return a + b;
  }, 0);
}

/**
 * Returns the highest value from an array. Can be array of numbers or array of strings.
 * NOTICE: Mixed values is not supported.
 *
 * @param {Array} array The array to process.
 * @returns {Number} Returns the highest value from an array.
 */
function arrayMax(array) {
  return arrayReduce(array, function (a, b) {
    return a > b ? a : b;
  }, Array.isArray(array) ? array[0] : void 0);
}

/**
 * Returns the lowest value from an array. Can be array of numbers or array of strings.
 * NOTICE: Mixed values is not supported.
 *
 * @param {Array} array The array to process.
 * @returns {Number} Returns the lowest value from an array.
 */
function arrayMin(array) {
  return arrayReduce(array, function (a, b) {
    return a < b ? a : b;
  }, Array.isArray(array) ? array[0] : void 0);
}

/**
 * Calculate average value for each item of the array.
 *
 * @param {Array} array The array to process.
 * @returns {Number} Returns calculated average value.
 */
function arrayAvg(array) {
  if (!array.length) {
    return 0;
  }

  return arraySum(array) / array.length;
}

/**
 * Flatten multidimensional array.
 *
 * @param {Array} array Array of Arrays
 * @returns {Array}
 */
function arrayFlatten(array) {
  return arrayReduce(array, function (initial, value) {
    return initial.concat(Array.isArray(value) ? arrayFlatten(value) : value);
  }, []);
}

/**
 * Unique values in the array.
 *
 * @param {Array} array The array to process.
 * @returns {Array}
 */
function arrayUnique(array) {
  var unique = [];

  arrayEach(array, function (value) {
    if (unique.indexOf(value) === -1) {
      unique.push(value);
    }
  });

  return unique;
}