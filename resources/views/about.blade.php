@extends('layouts.app')

@section('content')

<body id="page-top">

  <section class="page-section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Background</h2>
          <h3 class=" text-thai text-muted" style="font-size: 20px;">ที่มาและความสำคัญ</h3>
        </div>
      </div>
      <br><br>
      <div class="row">
        <div class="col-md-5">
          <img class="img-fluid d-block mx-auto" src="https://cdn.pixabay.com/photo/2017/07/31/18/17/laptop-2559707_1280.jpg" alt="">
        </div>
        <div class="col-md-7">
          <p class="text-thai">
            <br><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            การออกแบบกราฟิกเป็นขั้นตอนที่จำเป็นมากในการสร้างซอฟต์แวร์ เนื่องจากจะเป็นสิ่งผู้ใช้มองเห็นและโต้ตอบโดยตรง ถ้าหากมีการออกแบบ
            กราฟิกที่ดี จะส่งผลให้ประสิทธิภาพการใช้งานโดยรวมเพิ่มสูงด้วยเช่นกัน และการจะรู้ว่าสื่อเชิงภาพนั้นใช้งานได้มากน้อยเพียงใดต้องมีการประเมิน
            และนำไปวิเคราะห์ผลลัพธ์ออกมา ซึ่งในการประเมินควรใช้ตัวชี้วัดที่เป็นมาตรฐานสากลมาช่วย เพื่อให้ทำการวัดความสามารถมีความน่าเชื่อถือมากขึ้น
            <br><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            จากการค้นคว้าพบว่ามีตัวชี้วัด หรือ metrics หลากหลาย ซึ่งสามารถใช้วิเคราะห์ได้กับงานหลายด้าน ผู้จัดทำจึงได้รวบรวมข้อมูลของ
            metrics ที่ควรใช้ในการประเมินสื่อเชิงภาพ และสร้าง tool ขึ้นมา ซึ่ง
            tool ดังกล่าวจะสามารถเลือกได้ว่าจะใช้ metrics ใดบ้างในการประเมิน
            สื่อเชิงภาพนั้น ๆ และเก็บรวบรวมเป็น model ให้แก่ผู้ใช้งาน สำหรับการ
            นำไปประเมินสื่อเชิงภาพ รวมถึงทำการประเมินผล และสรุปผลของสื่อเชิง
            ภาพที่ผู้ใช้ต้องการประเมินโดยใช้ metrics ที่ผู้ใช้เลือก ผลลัพธ์จะออกมา
            ในรูปแบบของรายงาน เพื่อให้ผู้ใช้สามารถนำไปต่อยอดในการพัฒนาหรือ
            แก้ไขสื่อเชิงภาพในอนาคต
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-light page-section" id="team">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Usability metrics</h2>
          <p class="text-thai text-muted">Usability metrics หรือตัวชี้วัดความสามารถในการใช้งานถูกใช้ใน
            การคาดคะเนขอบเขตของซอฟต์แวร์ โดยซอฟต์แวร์ต้องสามารถทำความ เข้าใจ เรียนรู้ ปฏิบัติงานได้อย่างถูกต้อง ดึงดูดความสนใจสอดคล้องและ
            เป็นไปตามกฎระเบียบต่าง ๆ ซึ่ง Usability metric ตามมาตรฐาน ISO/IEC 9126-2 และ ISO/IEC 9126-3 ในโครงงานนี้Usability metrics หลัก ๆ
            ที่เลือกมาใช้ในการศึกษา ได้แก่
          </p>
        </div>
      </div>
      <br><br>
      <div class="row">
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="images/doc/understand.jpg" alt="">
            <h4>Understandability Metrics</h4>
            <br>
            <p class="text-thai">
              ตัวชี้วัดความเข้าใจในการใช้งาน
              ผู้ใช้ควรเลือกใช้ผลิตภัณฑ์ หรือซอฟต์แวร์ที่เหมาะสำหรับความต้องการใน
              การใช้งานของผู้ใช้รวมถึงมีความสามารถในการสื่อความหมายให้ผู้ใช้
              เข้าใจ แม้ว่าจะเป็นผู้ใช้งานใหม่ที่เพิ่งเริ่มต้นใช้งานเป็นครั้งแรก ซึ่งสิ่งที่ต้อง
              คำนึงถึงใน Understandability metric ได้แก่ความเหมาะสมในการใช้
              งานโปรแกรมนั้น ๆ และวิธีการนำไปใช้งานจริง
            </p>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="images/doc/attractive.jpg" alt="">
            <h4>Attractiveness Metrics</h4>
            <br>
            <p class="text-thai">
              ตัวชี้วัดที่เกี่ยวกับรูปลักษณ์ภายนอกของซอฟต์แวร์หรือการดึงดูดความสนใจจากผู้ใช้ ซึ่งค่าจะส่งผลจากปัจจัย
              ที่เกี่ยวข้อง เช่น การออกแบบและจัดวางหน้าจอ สีสันที่ใช้
            </p>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="images/doc/learn.jpg" alt="">
            <h4>Learnability Metrics</h4>
            <br>
            <p class="text-thai">
              ตัวชี้วัดในการเรียนรู้ โดยจะประเมินจาก
              เวลาที่ผู้ใช้ใช้ในการเรียนรู้ในว่าแต่ละฟังก์ชันในซอฟต์แวร์ใช้งานอย่างไร
              และรูปลักษณ์ภายนอกของซอฟต์แวร์โดย Learnability metrics จะ
              ได้รับผลกระทบจากปัจจัยต่าง ๆ ยกตัวอย่างเช่น การออกแบบลักษณะ
              ของซอฟต์แวร์และสีสันที่ใช้ซึ่ง Learnability metrics นี้เป็นตัวชี้วัดที่
              สำคัญอย่างยิ่งสำหรับผลิตภัณฑ์ต่าง ๆ
            </p>
          </div>
        </div>
      </div>
  </section>

  <section class="page-section" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Features</h2>

        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <ul class="timeline">
            <li>
              <div class="timeline-image">
                <img class="mt-4 img-fluid" src="images/element/1.png" alt="" width="100px">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>Upload Graphic Media</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-thai">สร้างโปรเจคของคุณ และอัปโหลดสื่อเชิงภาพ หรือรูปภาพที่ต้องการการประเมินในโปรเจคนั้น ๆ</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="mt-3 img-fluid" src="images/element/2.png" alt="" width="90px">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>Create a Measurement Model</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-thai">สร้างแบบจำลองตัวชี้วัดความสามารถในการใช้งาน เพื่อประเมินสื่อเชิงภาพของคุณ</p>
                </div>
              </div>
            </li>
            <li>
              <div class="timeline-image">
                <img class="mt-3 img-fluid" src="images/element/3.png" alt="" width="100px">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>Generate Evaluation form</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-thai">สร้างแบบสอบถามการประเมินจากตัวชี้วัดความสามารถในการใช้งานที่เลือก และส่งให้กับผู้ประเมิน</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="mt-3 img-fluid" src="images/element/4.png" alt="" width="100px">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>See Report</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-thai">เก็บรวมรวบคำถามที่ได้จากการประเมิน และสรุปผลในรูปแบบของรายงานผลการประเมินสื่อเชิงภาพของคุณ </p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <h4>Be Part
                  <br>Of Our
                  <br>Story!</h4>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
</body>


@endsection