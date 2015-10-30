<?php

class R1Interval {
    private $lo;
    private $hi;

    /** Interval constructor. If lo > hi, the interval is empty. */
    public function __construct($lo, $hi) {
        $this->lo = $lo;
        $this->hi = $hi;
    }

    /**
     * Returns an empty interval. (Any interval where lo > hi is considered
     * empty.)
     */
    public static function emptya() {
        return new R1Interval(1, 0);
    }

    /**
     * Convenience method to construct an interval containing a single point.
     */
    public static function fromPoint($p) {
        return new R1Interval($p, $p);
    }

    /**
     * Convenience method to construct the minimal interval containing the two
     * given points. This is equivalent to starting with an empty interval and
     * calling AddPoint() twice, but it is more efficient.
     */
    public static function fromPointPair($p1, $p2) {
        if ($p1 <= $p2) {
            return new R1Interval($p1, $p2);
        } else {
            return new R1Interval($p2, $p1);
        }
    }

    public function lo() {
        return $this->lo;
    }

    public function hi() {
        return $this->hi;
    }

    /**
     * Return true if the interval is empty, i.e. it contains no points.
     */
    public function isEmpty() {
        return $this->lo() > $this->hi();
    }

    /**
     * Return the center of the interval. For empty intervals, the result is
     * arbitrary.
     */
    public function getCenter() {
        return 0.5 * ($this->lo() + $this->hi());
    }

    /**
     * Return the length of the interval. The length of an empty interval is
     * negative.
     */
    public function getLength() {
        return $this->hi() - $this->lo();
    }

//  public boolean contains(double p) {
//    return p >= lo() && p <= hi();
//  }

//  public boolean interiorContains(double p) {
//    return p > lo() && p < hi();
//  }

    /** Return true if this interval contains the interval 'y'. */
//  public boolean contains(R1Interval y) {
//    if (y.isEmpty()) {
//      return true;
//    }
//    return y.lo() >= lo() && y.hi() <= hi();
//  }

    /**
     * Return true if the interior of this interval contains the entire interval
     * 'y' (including its boundary).
     */
//  public boolean interiorContains(R1Interval y) {
//    if (y.isEmpty()) {
//      return true;
//    }
//    return y.lo() > lo() && y.hi() < hi();
//  }

    /**
     * Return true if this interval intersects the given interval, i.e. if they
     * have any points in common.
     */
    public function intersects(R1Interval $y) {
        if ($this->lo() <= $y->lo()) {
            return $y->lo() <= $this->hi() && $y->lo() <= $y->hi();
        } else {
            return $this->lo() <= $y->hi() && $this->lo() <= $this->hi();
        }
    }

    /**
     * Return true if the interior of this interval intersects any point of the
     * given interval (including its boundary).
     */
//  public boolean interiorIntersects(R1Interval y) {
//    return y.lo() < hi() && lo() < y.hi() && lo() < hi() && y.lo() <= y.hi();
//  }

    /** Expand the interval so that it contains the given point "p". */
    /*  public R1Interval addPoint(double p) {
    if (isEmpty()) {
    return R1Interval.fromPoint(p);
    } else if (p < lo()) {
    return new R1Interval(p, hi());
    } else if (p > hi()) {
    return new R1Interval(lo(), p);
    } else {
    return new R1Interval(lo(), hi());
    }
    }*/

    /**
     * Return an interval that contains all points with a distance "radius" of a
     * point in this interval. Note that the expansion of an empty interval is
     * always empty.
     */
    public function expanded($radius) {
// assert (radius >= 0);
        if ($this->isEmpty()) {
            return $this;
        }
        return new R1Interval($this->lo() - $radius, $this->hi() + $radius);
    }

    /**
     * Return the smallest interval that contains this interval and the given
     * interval "y".
     */
    public function union(R1Interval $y) {
        if ($this->isEmpty()) {
            return $y;
        }
        if ($y->isEmpty()) {
            return $this;
        }
        return new R1Interval(min($this->lo(), $y->lo()), max($this->hi(), $y->hi()));
    }

    /**
     * Return the intersection of this interval with the given interval. Empty
     * intervals do not need to be special-cased.
     */
    public function intersection(R1Interval $y) {
        return new R1Interval(max($this->lo(), $y->lo()), min($this->hi(), $y->hi()));
    }

//  @Override
//  public boolean equals(Object that) {
//    if (that instanceof R1Interval) {
//      R1Interval y = (R1Interval) that;
// Return true if two intervals contain the same set of points.
//      return (lo() == y.lo() && hi() == y.hi()) || (isEmpty() && y.isEmpty());
//
//    }
//    return false;
//  }

//  @Override
//  public int hashCode() {
//    if (isEmpty()) {
//      return 17;
//    }

//    long value = 17;
//    value = 37 * value + Double.doubleToLongBits(lo);
//    value = 37 * value + Double.doubleToLongBits(hi);
//    return (int) (value ^ (value >>> 32));
//  }

//  public boolean approxEquals(R1Interval y) {
//    return approxEquals(y, 1e-15);
//  }

    /**
     * Return true if length of the symmetric difference between the two intervals
     * is at most the given tolerance.
     *
     */
//  public boolean approxEquals(R1Interval y, double maxError) {
//    if (isEmpty()) {
//      return y.getLength() <= maxError;
//    }
//    if (y.isEmpty()) {
//      return getLength() <= maxError;
//    }
//    return Math.abs(y.lo() - lo()) + Math.abs(y.hi() - hi()) <= maxError;
//  }
//
//  @Override
//  public String toString() {
//    return "[" + lo() + ", " + hi() + "]";
//  }
}
