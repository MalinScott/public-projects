import MeetupList from "../components/meetups/MeetupList";
import axios from "axios";
import { useState, useEffect } from "react";
const api = axios.create({
  baseURL: "firebase_URL",
  responseType: "json",
});

function AllMeetupsPage() {
  const [isLoading, setIsLoading] = useState(true);
  const [loadedMeetups, setLoadedMeetups] = useState([]);

   useEffect(() => {
      fetch("firebase_URL")
      .then((res) => {
        return res.json();
      })
      .then((data) => {
         const meetups = [];

         for (const key in data) {
            const meetup = {
               id: key,
               ...data[key]
            };
            meetups.push(meetup)
         }


        setIsLoading(false);
        setLoadedMeetups(meetups);
      });
   }, []);



  if (isLoading) {
    return (
      <section>
        <p>Loading...</p>
      </section>
    );
  }

  return (
    <section>
      <h1>All Meetups Page</h1>
      <MeetupList meetups={loadedMeetups} />
    </section>
  );
}

export default AllMeetupsPage;
