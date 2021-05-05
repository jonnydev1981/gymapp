import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import Workout from './Workout';

const totalNumberOfUsers = 25;
// for now we'll get the userId randomly until we implement authentication
const userId = Math.floor(Math.random() * Math.floor(totalNumberOfUsers));

class Main extends Component {

  constructor() {

    super();

    // currentWorkout keeps track of the product currently displayed
    this.state = {
      workouts: []
    }
  }

  componentDidMount() {
    fetch(`/api/workouts`)
      .then(response => {
        return response.json();
      })
      .then(workouts => {
        this.setState({workouts});
      });
  }

  handleClick(workout) {
    this.setState({currentWorkout: workout});
  }

  renderWorkouts() {
    return this.state.workouts.map(workout => {
      return (
        <li onClick={() => this.handleClick(workout)}
            key={workout.id}
            className={workout.performed ? "workout strikethrough" : "workout"}>
          {workout.name}
        </li>
      );
    })
  }

  render() {
    return (
      <div id="app" className="container p-5">
        <div className="row">
          <div className="col-4">
            <h3> All workouts </h3>
            <ul>
              {this.renderWorkouts()}
            </ul>
          </div>

          <div className="col-8">
            <Workout workout={this.state.currentWorkout ?? ''}/>
          </div>
        </div>
      </div>
    );
  }
}

export default Main;

if (document.getElementById('user')) {
  ReactDOM.render(<Main/>, document.getElementById('user'));
}
