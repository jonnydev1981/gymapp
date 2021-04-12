import React, {Component} from 'react';

const Workout = ({workout}) => {
  if (!workout) {
    return (
      <div className="single-workout-wrapper">
        <h4>No workout selected.</h4>
      </div>
    )
  }
  return (
    <div className="single-workout-wrapper">
      <h3> {workout.name} </h3>
      <p> {workout.performed} </p>
    </div>
  )
};

export default Workout;
