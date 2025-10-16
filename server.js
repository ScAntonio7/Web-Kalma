import 'dotenv/config';
import express from 'express';
import helmet from 'helmet';
import cors from 'cors';
import mysql from 'mysql2/promise';
import path from 'path';
import { fileURLToPath } from 'url';
import { z } from 'zod';

const pool = await mysql.createPool({
  host: process.env.DB_HOST || 'localhost',
  port: Number(process.env.DB_PORT || 3306),
  user: process.env.DB_USER || 'root',
  password: process.env.DB_PASS || '',
  database: process.env.DB_NAME || 'kalma',
  waitForConnections: true,
  connectionLimit: 10
});

const app = express();
app.use(helmet());
app.use(cors({ origin: process.env.CORS_ORIGIN || true }));
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);
app.use(express.static(path.join(__dirname, 'public')));

const subscribeSchema = z.object({ email: z.string().email() });
const contactSchema = z.object({
  name: z.string().min(2).max(100),
  email: z.string().email(),
  message: z.string().min(5).max(2000)
});

app.post('/api/subscribe', async (req, res) => {
  try {
    const { email } = subscribeSchema.parse(req.body);
    await pool.execute('INSERT IGNORE INTO Subscription (email) VALUES (?)', [email]);
    res.status(201).json({ ok: true, msg: 'Suscripción guardada' });
  } catch (err) {
    res.status(500).json({ ok: false, error: 'DB error' });
  }
});

app.post('/api/contact', async (req, res) => {
  try {
    const d = contactSchema.parse(req.body);
    await pool.execute(
      'INSERT INTO ContactMessage (name, email, message) VALUES (?, ?, ?)',
      [d.name, d.email, d.message]
    );
    res.status(201).json({ ok: true, msg: 'Mensaje recibido' });
  } catch (err) {
    res.status(500).json({ ok: false, error: 'DB error' });
  }
});

app.get('/api/health', (_req, res) => res.json({ ok: true }));

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => console.log(`Kalma site (MySQL) en http://localhost:${PORT}`));
