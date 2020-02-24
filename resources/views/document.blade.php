@extends('layouts.app')

@section('content')

<section class="about mt-2 mx-3">

  <!-- 1 -->
  <div class="container mt-3 mx-4">
    <div class="row">
      <div class="twelve columns">
        <h1 style='text-align: center; font-size:60px;'> Metrics </h1>
      </div>
    </div>
    <!--end of .row-->
    <div class="row bottom mr-5">
      <div class="two-thirds column">
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
    </div>

    <!-- 2 -->

    <div class="row">
      <div class="twelve columns">
        <h1 style='text-align: center; font-size:60px;'> Usability metrics </h1>
      </div>
    </div>
    <!--end of .row-->

    <div class="row bottom mr-5">
      <div class="two-thirds column">
        <p>Usability metrics หรือตัวชี้วัดความสามารถในการใช้งานถูกใช้ใน
          การคาดคะเนขอบเขตของซอฟต์แวร์ โดยซอฟต์แวร์ต้องสามารถทำความ
          เข้าใจ เรียนรู้ ปฏิบัติงานได้อย่างถูกต้อง ดึงดูดความสนใจสอดคล้องและ
          เป็นไปตามกฎระเบียบต่าง ๆ ซึ่ง Usability metric ตามมาตรฐาน
          ISO/IEC 9126-2
          [1] และ ISO/IEC 9126-3
          [2] จะประกอบไปด้วย metrics
          ดังต่อไปนี้
          - Understandability metrics
          - Learnability metrics
          - Operability metrics
          - Attractiveness metrics
          - Usability compliance metrics
          ในโครงงานนี้Usability metrics หลัก ๆ ที่เลือกมาใช้ในการศึกษา
          ได้แก่ Understandability metrics, Learnability metrics และ
          Attractiveness metrics</p>
      </div>

      <!-- 3 -->

      <div class="one-third column" style="column-count:2;">

        <div style='column-width:50 px'>
          <h3 style='text-align: center; '> Understandability metrics </h3>
          <img src="/images/element/icon2.png" style="width: 50%; display: block; margin: auto;">
        </div>

        <div style="column-width:250 px ">
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
      </div>

      <!-- 4 -->

      <div class="one-third column" style="column-count:2;">

        <div style='column-width:50 px'>
          <h3 style='text-align: center; '> Learnability metrics </h3>
          <img src="/images/element/icon2.png" style="width: 50%; display: block; margin: auto;">
        </div>

        <div style="column-width:250 px ">
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
      </div>

      <!-- 5 -->

      <div class="one-third column" style="column-count:2;">

        <div style='column-width:50 px'>
          <h3 style='text-align: center; '> Attractiveness metrics </h3>
          <img src="/images/element/icon2.png" style="width: 50%; display: block; margin: auto;">
        </div>

        <div style="column-width:250 px ">
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

    </div>
    <!--end of .row-->
  </div>
  <!--end of .container-->
</section>

@endsection

<style scope>
  .about {
    background: url("https://unsplash.it/1080/720/?image=349") no-repeat fixed center / cover;
    color: black;

  }

  .about .one-third,
  .about .two-thirds {
    background: white;
    background: rgba(255, 255, 255, .3);
    padding: 20px;
    border-radius: 5px;
  }

  .about .one-third {
    margin-top: 20px;
  }

  .about a {
    margin-top: 10px;
  }

  .about ul {
    margin-bottom: 18px;
  }

  .about h3:after,
  .contact h3:after {
    border-color: black;
  }

  .about .center {
    text-align: center;
  }

  .about .bottom {
    margin-bottom: 20px;
    padding-bottom: 20px;
  }

  .about .one-third a {
    margin: 10px auto;
    width: 50%;
    display: block;
  }

  .about .two-thirds p:last-child {
    margin-bottom: 0;
  }
</style>