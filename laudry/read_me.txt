* จากการออกแบบระบบตามโจทย์ ปัญหา
เบื้องต้นออกแบบระบบง่ายๆ ให้สามารถแสดงมุมที่ตอบสนองต่อโจทย์

1.ข้อมูลเป็นรูปแบบใช้เพื่อการ mock-up ทั้งหมด จึงไม่ได้แสดงมีส่วนที่ใช้ทำ logical กับ API มากนัก
2. ระบบคำนวนเวลาใช้การกำหนดอย่างง่าย นับจากเวลากดเริ่มต้น + 2 นาที 
3. การรับข้อมูลติดต่อลูกค้าใช้การกำหนดค่าอย่างง่ายแทน ( ขาดประสบการณ์ qr-code scan @line)
4.การแจ้งเตือน ทำด้วย script นับเวลา ส่งผ่าน ajax (ยังขาด tokens ที่จะส่งข้อความใน @line ผู้ใช้)
5.responsive แบบง่ายๆ col , @media 
6.ลูกเล่นส่วนมากทำผ่าน web api Dom , jquery 

