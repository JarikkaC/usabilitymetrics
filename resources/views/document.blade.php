@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<body>
    <div>
        <br>
        <h1 style='text-align: center; font-size:60px;'> Metrics </h1>

        <div class="introduction">
            <p>การออกแบบกราฟิกเป็นขั้นตอนที่จำเป็นมากในการสร้างซอฟต์แวร์
            เนื่องจากจะเป็นสิ่งผู้ใช้มองเห็นและโต้ตอบโดยตรง ถ้าหากมีการออกแบบ
            กราฟิกที่ดี จะส่งผลให้ประสิทธิภาพการใช้งานโดยรวมเพิ่มสูงด้วยเช่นกัน
            และการจะรู้ว่าสื่อเชิงภาพนั้นใช้งานได้มากน้อยเพียงใดต้องมีการประเมิน
            และนำไปวิเคราะห์ผลลัพธ์ออกมา ซึ่งในการประเมินควรใช้ตัวชี้วัดที่เป็น
            มาตรฐานสากลมาช่วย เพื่อให้ทำการวัดความสามารถมีความน่าเชื่อถือ
            มากขึ้น
            จากการค้นคว้าพบว่ามีตัวชี้วัด หรือ metrics หลากหลาย ซึ่ง
            สามารถใช้วิเคราะห์ได้กับงานหลายด้าน ผู้จัดทำจึงได้รวบรวมข้อมูลของ
            metrics ที่ควรใช้ในการประเมินสื่อเชิงภาพ และสร้าง tool ขึ้นมา ซึ่ง
            tool ดังกล่าวจะสามารถเลือกได้ว่าจะใช้ metrics ใดบ้างในการประเมิน
            สื่อเชิงภาพนั้น ๆ และเก็บรวบรวมเป็น model ให้แก่ผู้ใช้งาน สำหรับการ
            นำไปประเมินสื่อเชิงภาพ รวมถึงทำการประเมินผล และสรุปผลของสื่อเชิง
            ภาพที่ผู้ใช้ต้องการประเมินโดยใช้ metrics ที่ผู้ใช้เลือก ผลลัพธ์จะออกมา
            ในรูปแบบของรายงาน เพื่อให้ผู้ใช้สามารถนำไปต่อยอดในการพัฒนาหรือ
            แก้ไขสื่อเชิงภาพในอนาคต</p>
        </div>

        <h2 style='text-align: center; font-size:35px;'> Usability metrics </h2>
        <div class="introduction">
            <p>การออกแบบกราฟิกเป็นขั้นตอนที่จำเป็นมากในการสร้างซอฟต์แวร์
            เนื่องจากจะเป็นสิ่งผู้ใช้มองเห็นและโต้ตอบโดยตรง ถ้าหากมีการออกแบบ
            กราฟิกที่ดี จะส่งผลให้ประสิทธิภาพการใช้งานโดยรวมเพิ่มสูงด้วยเช่นกัน
            และการจะรู้ว่าสื่อเชิงภาพนั้นใช้งานได้มากน้อยเพียงใดต้องมีการประเมิน
            และนำไปวิเคราะห์ผลลัพธ์ออกมา ซึ่งในการประเมินควรใช้ตัวชี้วัดที่เป็น
            มาตรฐานสากลมาช่วย เพื่อให้ทำการวัดความสามารถมีความน่าเชื่อถือ
            มากขึ้น
            จากการค้นคว้าพบว่ามีตัวชี้วัด หรือ metrics หลากหลาย ซึ่ง
            สามารถใช้วิเคราะห์ได้กับงานหลายด้าน ผู้จัดทำจึงได้รวบรวมข้อมูลของ
            metrics ที่ควรใช้ในการประเมินสื่อเชิงภาพ และสร้าง tool ขึ้นมา ซึ่ง
            tool ดังกล่าวจะสามารถเลือกได้ว่าจะใช้ metrics ใดบ้างในการประเมิน
            สื่อเชิงภาพนั้น ๆ และเก็บรวบรวมเป็น model ให้แก่ผู้ใช้งาน สำหรับการ
            นำไปประเมินสื่อเชิงภาพ รวมถึงทำการประเมินผล และสรุปผลของสื่อเชิง
            ภาพที่ผู้ใช้ต้องการประเมินโดยใช้ metrics ที่ผู้ใช้เลือก ผลลัพธ์จะออกมา
            ในรูปแบบของรายงาน เพื่อให้ผู้ใช้สามารถนำไปต่อยอดในการพัฒนาหรือ
            แก้ไขสื่อเชิงภาพในอนาคต
            </p>
        </div>

        <div class="photo">
            <img src="/images/element/icon1.png" width="170" height="170">
        </div>

        <h3> Usability metrics </h3>
        <div class="content">
            <p>
                Understandability metrics คือตัวชี้วัดความเข้าใจในการใช้งาน
                ผู้ใช้ควรเลือกใช้ผลิตภัณฑ์ หรือซอฟต์แวร์ที่เหมาะสำหรับความต้องการใน
                การใช้งานของผู้ใช้รวมถึงมีความสามารถในการสื่อความหมายให้ผู้ใช้
                เข้าใจ แม้ว่าจะเป็นผู้ใช้งานใหม่ที่เพิ่งเริ่มต้นใช้งานเป็นครั้งแรก ซึ่งสิ่งที่ต้อง
                คำนึงถึงใน Understandability metric ได้แก่ความเหมาะสมในการใช้
                งานโปรแกรมนั้น ๆ และวิธีการนำไปใช้งานจริง ซึ่งใน Understandability
                metric จะมี metric ย่อย ๆ อีกหลาย metrics ดังที่จะยกตัวอย่างต่อไปนี้
                - Completeness of description metrics
                - Demonstration capability metrics
                - Evident functions metrics
                - Function understandability metrics  
            </p>
        </div>

        <div class="photo">
            <img src="/images/element/icon2.png" width="170" height="170">
        </div>

        <h3>  Learnability metrics </h3>
        <div class="content">
            <p>
                Learnability metrics เป็นตัวชี้วัดในการเรียนรู้ โดยจะประเมินจาก
                เวลาที่ผู้ใช้ใช้ในการเรียนรู้ในว่าแต่ละฟังก์ชันในซอฟต์แวร์ใช้งานอย่างไร
                และรูปลักษณ์ภายนอกของซอฟต์แวร์โดย Learnability metrics จะ
                ได้รับผลกระทบจากปัจจัยต่าง ๆ ยกตัวอย่างเช่น การออกแบบลักษณะ
                ของซอฟต์แวร์และสีสันที่ใช้ซึ่ง Learnability metrics นี้เป็นตัวชี้วัดที่
                สำคัญอย่างยิ่งสำหรับผลิตภัณฑ์ต่าง ๆ โดยใน Learnability metrics ยังมี
                metrics ย่อย ๆ อีก ได้แก่ Completeness of user documentation
                and/or help facility metrics
            </p>
        </div>

        <div class="photo">
            <img src="/images/element/icon3.png" width="170" height="170">
        </div>

        <h3>  Attractiveness metrics </h3>
        <div class="content">
            <p>
                Attractiveness metrics เป็นตัวชี้วัดที่เกี่ยวกับรูปลักษณ์ภายนอก
                ของซอฟต์แวร์หรือการดึงดูดความสนใจจากผู้ใช้ ซึ่งค่าจะส่งผลจากปัจจัย
                ที่เกี่ยวข้อง เช่น การออกแบบและจัดวางหน้าจอ สีสันที่ใช้ซึ่ง
                Attractiveness metrics มี metric อื่นอีก ได้แก่
                - Attractiveness interaction metrics
                - User interface appearance customisability metrics
            </p>
        </div>

    </div>

</body>

@endsection

<style scope>
    html,
    body {
        font-family: 'Nunito', sans-serif;
        font-weight: 200px;
        margin: 0px;
        padding: 0px;
    }
    .introduction {
        float: left;          
        margin-top: 10px;
        margin-left: 100px;
        margin-right: 100px;
        line-height: 25px;
        text-align: center;
        font-size: 20px;
    }
    .photo {
        margin-left: 100px;
        margin-right: 50px;
        margin-bottom: 15px;
        float: left;
        padding: 5px; 
    }
    .content {
        line-height: 28px;
        font-size: 20px;
        margin-right: 100px;
        margin-bottom: 15px;
        padding: 5px;
        height: auto;
    }
</style>