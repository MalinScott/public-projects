import NewMeetupForm from "../components/meetups/NewMeetupForm";
import axios from 'axios';
import {useNavigate} from 'react-router-dom';


const api = axios.create({
   baseURL: "firebase_URL",
   responseType: "json"

})


function NewMeetupPage() {
   const navigate = useNavigate();

   // Post the new meetup
   const addMeetupHandler = async(meetupData) => {
      const url = 'meetups.json';
      await api.post(url, JSON.stringify(meetupData) )
      .then(res => {
         console.log(res.data);
         navigate('/');
      })
      .catch(error => {
         console.log(error);
      })
   }
  return (
    <section>
      <h1>Add New Meetup</h1>
      <NewMeetupForm onAddMeetup={addMeetupHandler} />
    </section>
  );
}

export default NewMeetupPage;
