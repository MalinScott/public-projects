import { MongoClient } from "mongodb";
import {
  connectDatabase,
  getAllDocuments,
  insertDocument,
} from "../../../helpers/db-util";

async function handler(req, res) {
  const eventId = req.query.eventId;

  let client;
  try {
    client = await connectDatabase();
  } catch (error) {
    res.status(500).json({ message: "Failed to connect to the database!" });
    return;
  }

  if (req.method === "POST") {
    // Serverside Validation
    const { email, name, text } = req.body;
    if (
      !email.includes("@") ||
      !name ||
      name.trim() === "" ||
      !text ||
      text.trim() === ""
    ) {
      res.status(422).json({ message: "Invalid Input!" });
      client.close();
      return;
    }
    const newComment = {
      email,
      name,
      text,
      eventId,
    };

    let result;
    try {
      result = await insertDocument(client, "comments", newComment);
      newComment._id = result.insertedId;
      res.status(201).json({ message: "Comment Added.", comment: newComment });
    } catch (error) {
      res.status(500).json({ message: "Failed to connect to the database!" });
    }
  } else if (req.method === "GET") {
    try {
      const documents = await getAllDocuments(client, "comments", { id: -1 }, { eventId: eventId });
      res.status(200).json({ comments: documents });
    } catch (error) {
      res
        .status(500)
        .json({ message: "Failed Retrieve comments from the Database!" });
    }
  }
  client.close();
}

export default handler;
